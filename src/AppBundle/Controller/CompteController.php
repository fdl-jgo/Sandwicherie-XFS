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
        // Entity manager
        // REquest
        // print datas in JSON

        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $PanierRepository = $em->getRepository(Panier::class);

        $panier = $PanierRepository->find($id);

        // I think the manager (which is an object manager in the datafixtures), has nothing to do in my case.
        // $manager->persist($commande);
        // $manager->flush();

        return $this->render('AppBundle:Compte:panier.html.twig', ["panier" => $panier]);
    }


    // ###################################################################
    // Fonctions pour AJAX / Datatable : Commandes
    // @Xavier
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
    

    // NO ROUTE DEFINED FOR NOW !
    public function validateCommande()
    {
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $CommandeRepository = $em->getRepository(Commande::class);

        $commande = new Commande();
        $commande->setPanier();
        $commande->setProcessed(true);
        $commande->setLivree(false);


        // I think the manager has nothing to do in my case.
        // $manager->persist($commande);
        // $manager->flush();

    }
}
