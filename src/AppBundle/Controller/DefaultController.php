<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function sandwichsAction()
    {
        return $this->render('AppBundle:Default:sandwichs.html.twig');
    }

    public function contactAction()
    {

        return $this->render('AppBundle:Default:contact.html.twig');
    }

//    -----------------------------
    public function loginAction()
    {
    	return $this->render('AppBundle::login_page.html.twig');
    }

    public function inscriptionAction()
    {
    	return $this->render('AppBundle:Compte:connexion.html.twig');
    }
}
