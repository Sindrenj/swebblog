<?php
/**
 * @file: UsersController.php
 * @creator: Sindre Njøsen 
 * @description:
 * Date: 28.10.2014
 */
 

namespace Sweb\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sweb\Bundle\BlogBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller{

	public function createAction( Request $request ) {
		//Create a post-object that can be used to configure the form:
		$user = new User();
		//Setup the form with the post-object:
		$form = $this->createFormBuilder($user)
		  ->add('firstName', 'text')
		  ->add('lastName', 'text')
		  ->add('nick', 'text')
		  ->add('password', 'text')
		  ->add('image', 'text')
		  ->add('save', 'submit', array('label' => 'Create user'))
		  ->getForm();
		//Handle the request to determine if the request is a submit:
		$form->handleRequest($request);

		//If the form is valid then save the object to the database and redirect:
		if( $form->isValid() ) {
			//Get the ORM-manager:
			$orm = $this->getDoctrine()->getManager();
			//Tell ORM to persist the object:
			$orm->persist($user);
			//Flush - Save by sending a sql-commando:
			$orm->flush();
			//Save the data to the database:
			return $this->render('SwebBlogBundle:Index:home.html.twig', array(
			  'page_title' => 'Blog - Users.',
			  'main_content_title' => 'Success',
			  'content' => 'The user were created.'
			));
		}
		//Render the form to the view:
		return $this->render('SwebBlogBundle:Users:create.html.twig', array(
		  'page_title' => 'Blog - Users.',
		  'main_content_title' => 'Create a user',
		  'success' => false,
		  'form' => $form->createView()
		));

	}

	public function loginAction() {
		$user = new User();
		//Setup the form with the post-object:
		$form = $this->createFormBuilder($user)
		  ->add('nick', 'text')
		  ->add('password', 'password')
		  ->add('save', 'submit', array('label' => 'Create user'))
		  ->getForm();

		return $this->render('SwebBlogBundle:Users:create.html.twig', array(
		  'page_title' => 'Sindrenj.no',
		  'main_content_title' => 'Login',
		  'success' => false,
		  'form' => $form->createView()
		));
	}

	public function logoutAction() {

	}



} 