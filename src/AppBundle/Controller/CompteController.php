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


    // Order = ASC || DESC 
    // Limit = LIMIT clause as INTEGER
    // Offset = offset of the LIMIT clause as INTEGER
    public function getCommandesByIDAction($order, $limit, $offset)
    {

    }

    public function getCommandesByDateAction($order, $limit, $offset)
    {

    }

    public function getCommandesByPriceAction($order, $limit, $offset)
    {

    }

    // ###################################################################
    // Fonctions pour AJAX / Datatable : Panier
    // ###################################################################

    public function getPanierAction($order, $limit, $offset)
    {
        // Entity manager
        // REquest
        // print datas in JSON
    }
}
