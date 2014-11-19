<?php

namespace WoYao\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WoYaoAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
