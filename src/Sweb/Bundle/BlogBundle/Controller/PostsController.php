<?php
/**
 * @file: PostsController.php
 * @creator: Sindre Njøsen 
 * @description:
 * Date: 27.10.2014
 */
 

namespace Sweb\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sweb\Bundle\BlogBundle\Entity\Post;
use Sweb\Bundle\BlogBundle\Entity\User;



class PostsController extends Controller {

  public function viewAllAction() {
	  //Get the posts:
	  $posts = $this->getDoctrine()->getManager()->getRepository('SwebBlogBundle:Post')->findAll();

	  return $this->render('SwebBlogBundle:Posts:posts.html.twig', array(
		'page_title' => 'Blog - Home',
		'main_content_title' => 'All posts',
		'posts' => $posts
	  ));
  }

  public function viewAction( $id = null ) {
	  $post = $this->getDoctrine()->getManager()->getRepository('SwebBlogBundle:Post')->find($id);
	  return $this->render('SwebBlogBundle:Posts:post.html.twig', array(
		'page_title' => 'Blog - View post',
		'post' => $post

	  ));

  }

  public function createAction( Request $request ) {
	  $default = array(
		  'page_title' => 'Create a post'

	  );
	  //Create a post-object that can be used to configure the form:
	  $post = new Post();
	  //Setup the form with the post-object:
	  $form = $this->createFormBuilder($post)
		->add('title', 'text')
		->add('author', 'integer', array('mapped' => false))
		->add('summary', 'text')
		->add('content', 'textarea')
	    ->add('save', 'submit', array('label' => 'Create post'))
		->getForm();
	  //Handle the request to determine if the request is a submit:
	  $form->handleRequest($request);

	  //If the form is valid then save the object to the database and redirect:
	  if( $form->isValid() ) {
		  //Get the ORM-manager:
		  $orm = $this->getDoctrine()->getManager();
		  $authorid = $form->get('author')->getData();
		  //And get the user that is the author:
		  $user = $orm->getRepository('SwebBlogBundle:User')->find($authorid);
		  //Add the author to the post:
		  $post->setAuthor($user);
		  //Tell ORM to persist the object:
		  $orm->persist($post);
		  //Flush - Save by sending a sql-commando:
		  $orm->flush();
		  //Render a response:
		  return $this->render('SwebBlogBundle:Index:home.html.twig', array(
			'page_title' => 'Blog - Posts.',
			'main_content_title' => 'Success!',
			'content' => 'The post were created.'
		  ));
	  }

	  //Render the form to the view:
	  return $this->render('SwebBlogBundle:Posts:create.html.twig', array(
		'page_title' => 'Blog - Create a post.',
		'main_content_title' => 'Create a post',
		'success' => false,
		 'form' => $form->createView()
	  ));

  }

  public function deleteAction() {

  }

  public function success() {
	  return new Response("Success! The object is saved!");
  }
}