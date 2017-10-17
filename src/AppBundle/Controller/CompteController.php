<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CompteController extends Controller
{

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
}
