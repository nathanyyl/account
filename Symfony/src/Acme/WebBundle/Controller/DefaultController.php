<?php

namespace Acme\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeWebBundle:Default:index.html.twig', array('name' => $name));
    }
}
