<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $test = $this->get("app.catalogue")
                    ->getCarteMenu();
        dump($test);
        dump($test[0]->getNom());
        dump($test[0]->getSandwichs()[0]);

        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function sandwichsAction()
    {
        $catalogues = $this->get('app.catalogue')->getCarteMenu();

        return $this->render('AppBundle:Default:sandwichs.html.twig', [
            'catalogues' => $catalogues
        ]);
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

    public function commandeAction()
    {
        return $this->render('AppBundle::commande.html.twig');
    }

     public function historiqueAction()
    {
        return $this->render('AppBundle:historique.html.twig');
    }

     public function panierAction()
    {
        return $this->render('AppBundle:panier.html.twig');
    }
}
