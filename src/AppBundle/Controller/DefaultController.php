<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    // Base
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    // @Fidel
    public function sandwichsAction()
    {
        return $this->render('AppBundle:Default:sandwichs.html.twig');
    }

    // @Fidel
    public function contactAction()
    {

        return $this->render('AppBundle:Default:contact.html.twig');
    }

    public function loginAction()
    {
    	return $this->render('AppBundle::login_page.html.twig');
    }

    // @Xavier
    public function inscriptionAction()
    {
    	return $this->render('AppBundle:Compte:connexion.html.twig');
    }

    // @Xavier
    public function commandeAction()
    {
        return $this->render('AppBundle::commande.html.twig');
    }

    // @Xavier
     public function historiqueAction()
    {
        return $this->render('AppBundle:historique.html.twig');
    }

    // @Xavier
     public function panierAction()
    {
        return $this->render('AppBundle:panier.html.twig');
    }
}
