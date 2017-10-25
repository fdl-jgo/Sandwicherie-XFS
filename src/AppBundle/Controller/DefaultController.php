<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Adresse;
use AppBundle\Entity\CarteMenu;
use AppBundle\Entity\Sandwich;
use AppBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    // Base
    public function indexAction()
    {
        // id du premier sandiwich
        $id = $this->getDoctrine()
            ->getRepository(Sandwich::class)
            ->findAll()[0]
            ->getId();

        $garnitures = $this->getDoctrine()
                        ->getRepository(Sandwich::class)
                        ->getSandwichWithId($id);  // method qui se trouve dans appbundle/repository/sandwichRepository

        $val = $this->getDoctrine()->getRepository(CarteMenu::class)->getSandwichMenu(11);
        dump($val);

        return $this->render('AppBundle:Default:index.html.twig');
    }

    // @Fidel
    public function sandwichsAction()
    {
        $catalogues = $this->get('app.catalogue')->getCarteMenu();

        return $this->render('AppBundle:Default:sandwichs.html.twig', [
            'catalogues' => $catalogues
        ]);
    }
    

    // @Fidel
    public function contactAction()
    {

        return $this->render('AppBundle:Default:contact.html.twig');
    }

    // Fidel
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
