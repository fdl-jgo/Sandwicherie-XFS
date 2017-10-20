<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApiBundle:Default:index.html.twig');
    }
}
