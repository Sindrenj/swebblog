<?php
/**
 * @file: IndexController.php
 * @creator: Sindre Njøsen 
 * @description:
 * Date: 27.10.2014
 */
 

namespace Sweb\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller {

  public function homeAction() {
	//Get the first post:
	$post = $this->getDoctrine()->getRepository('SwebBlogBundle:Post')->find(1);

    return $this->render('SwebBlogBundle:Posts:post.html.twig', array(
		'page_title' => 'Blog - Home',
		'post' => $post
	));
  }

  public function aboutAction() {
	  return $this->render('SwebBlogBundle:index:home.html.twig', array(
		'page_title' => 'Blog - Home',
		'main_content_title' => 'Welcome!',
		'content' => 'Welcome to the about-page..!'
	  ));
  }
} 