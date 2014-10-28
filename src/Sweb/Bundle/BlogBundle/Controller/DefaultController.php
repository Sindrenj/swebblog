<?php

namespace Sweb\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
	  	return $this->render('SwebBlogBundle:Default:home.html.twig', array('name' => $name));

    }
}
