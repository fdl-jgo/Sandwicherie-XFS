<?php

// Xavier !
namespace AppBundle\Controller;

use AppBundle\Entity\Ville;
use AppBundle\Entity\Panier;
use AppBundle\Entity\LignePanier;
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
     public function panierAction($id)
    {
        // Entity manager
        // REquest
        // print datas in JSON

        $panier = $this->getDoctrine()->getRepository(Panier::class)->find($id);

        $panier_content = $this->getDoctrine()->getRepository(LignePanier::class)->find_lines($id);


        // foreach($panier_content as $key)
        // {
        //     $sandwich = $this->getDoctrine()->getRepository(Sandwich::class)->find($key->sandwich);
        //     dump($sandwich);
        //     $prixPain = $this->getDoctrine()->getRepository(Pain::class)->find($sandwich->pain);

        //     $prixGarniture = $this->getDoctrine()->getRepository(SandwichGaniture::class)->find($sandwich->);
            
        //     $prixTotal = $prixGarniture + $prixPain;
        //     $key .= ["prix_sandwich" => $prixTotal];
        // }

        
        // I think the manager (which is an object manager in the datafixtures), has nothing to do in my case.
        // $manager->persist($commande);
        // $manager->flush();

        // dump($panier_content);
        return $this->render('AppBundle:Compte:panier.html.twig', ["panier_content" => $panier_content]);

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
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $CommandeRepository = $em->getRepository(Commande::class);

        $panier = $PanierRepository->find($id);


    }

    public function getCommandesByDateAction($order, $limit, $offset)
    {
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $CommandeRepository = $em->getRepository(Commande::class);
    }

    public function getCommandesByPriceAction($order, $limit, $offset)
    {
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $CommandeRepository = $em->getRepository(Commande::class);
    }
    

    // NO ROUTE DEFINED FOR NOW !
    // A refaire avec une méthode dans le repo.
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
