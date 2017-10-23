<?php

// Xavier !
namespace AppBundle\Controller;

use AppBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CompteController extends Controller
{

    // Fonctions de vues / pages 

    // @Xavier
    public function commandeAction()
    {
        return $this->render('AppBundle:Compte:commande.html.twig');
    }

    // @Xavier
     public function historiqueAction()
    {
        return $this->render('AppBundle:Compte:historique.html.twig');
    }

    // @Xavier
     public function panierAction()
    {
        return $this->render('AppBundle:Compte:panier.html.twig');
    }



    // ###################################################################
    // Fonctions pour AJAX / Datatable : Commandes
    // ###################################################################
    public function getCommandesByIDASCAction()
    {

    }

    public function getCommandesByIDDESCAction()
    {

    }

    public function getCommandesByDateASCAction()
    {

    }

    public function getCommandesByDateDESCAction()
    {

    }

    public function getCommandesByPriceASCAction()
    {

    }

    public function getCommandesByPriceDESCAction()
    {

    }

    // ###################################################################
    // Fonctions pour AJAX / Datatable : Panier
    // ###################################################################

    public function getPanierAction()
    {

    }
}
