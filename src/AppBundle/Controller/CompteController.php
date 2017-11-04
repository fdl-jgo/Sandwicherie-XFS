<?php

// Xavier !
namespace AppBundle\Controller;

use AppBundle\Entity\Ville;
use AppBundle\Entity\Panier;
use AppBundle\Entity\LignePanier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;

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

        $id = $this->getUser();
        // dump($id);
        $id = $id->getId();
        dump($id);

        // Verification que l'utilisateur est connecté et qu'on peut bien recuperer son id.
        if(!isset($id) || empty($id))
        {
            throw new Exception('Impossible d\'accéder à votre identifiant d\'utilisateur. Etes vous bien connecté !?');
        }

        // Recuperation du panier en DB. (infos de base)
        $panier = $this->getDoctrine()->getRepository(Panier::class)->getPanierForUser(3);
        dump($panier);

        $id_panier = $panier[0]->getId();
        dump($id_panier);

        // Si aucun panier n'a été trouvé.
        if(!isset($id_panier) || empty($id_panier))
        {
            throw new Exception('Aucun panier vous appartenant n\'a été trouvé !');
        }
        else
        {
            // Récupération du contenu du panier
            $panier_content = $this->getDoctrine()->getRepository(LignePanier::class)->find_lines($id_panier);
        }

        

        // dump($panier_content);
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
