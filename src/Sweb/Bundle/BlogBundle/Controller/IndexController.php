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

  private $jsonld = '
	{
	  "@context" : "http://schema.org/",
	  "@id" : "http://sindrenj.no",
	  "@type" : "Person",
	  "name" : "Sindre Njøsen",
	  "givenName" : "Sindre",
	  "familyName" : "Njøsen",
	  "email" : "sindre[at]sindrenj[dot]net",
	  "jobTitle" : "Student",
	  "url" : "@id"
	}
  ';


  public function homeAction() {
	//Get the first post:
	$post = $this->getDoctrine()->getRepository('SwebBlogBundle:Post')->find(1);

    return $this->render('SwebBlogBundle:Posts:post.html.twig', array(
		'rdfProfile' => $this->jsonld,
		'page_title' => 'Sindrenj.no',
		'post' => $post
	));
  }

  public function aboutAction() {
	  return $this->render('SwebBlogBundle:index:home.html.twig', array(
		'page_title' => 'Sindrenj.no',
		'main_content_title' => 'Om',
		'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
	  	'img' => 'bundles/sbundle/images/content/sindre.jpg'
	  ));
  }
} 