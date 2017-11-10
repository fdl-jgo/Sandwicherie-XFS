<?php

// Xavier !
namespace AppBundle\Controller;

use AppBundle\Entity\Ville;
use AppBundle\Entity\Panier;
use AppBundle\Entity\LignePanier;
use AppBundle\Entity\Sandwich;
use AppBundle\Entity\Pain;
use AppBundle\Entity\SandwichGarniture;
use AppBundle\Entity\Garniture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;


class CompteController extends Controller
{

    // Fonctions de vues / pages 

    // @Xavier
    public function commandeAction($id)
    {
        $commande = $this->getDoctrine()->getRepository(Commande::class)->find($id);
        dump($commande);
        return $this->render('AppBundle:Compte:commande.html.twig', ["commande" => $commande]);
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

        // Verification que l'utilisateur est connecté et qu'on peut bien recuperer son id.
        if(!isset($id) || empty($id))
        {
            throw new Exception('Impossible d\'accéder à votre identifiant d\'utilisateur. Etes vous bien connecté !?');
        }

        // Recuperation du panier en DB. (infos de base)
        $panier = $this->getDoctrine()->getRepository(Panier::class)->getPanierForUser(3);
        // dump($panier);

        // Si aucun panier n'a été trouvé.
        if(!isset($panier) || empty($panier))
        {
            throw new Exception('Aucun panier vous appartenant n\'a été trouvé !');
        }
        else
        {
            // Récupération du contenu du panier
            $id_panier = $panier[0]->getId();
            $panier_content = $this->getDoctrine()->getRepository(LignePanier::class)->find_lines($id_panier);
        }

        // dump($panier_content);
        $i = 0;

        foreach($panier_content as $key)
        {
            $sandwich = $this->getDoctrine()->getRepository(Sandwich::class)->find($key["sandwich_id"]);
            $prixPain = $this->getDoctrine()->getRepository(Pain::class)->find($sandwich->getPain()->getId());
            $prixGarniture = $this->getDoctrine()->getRepository(SandwichGarniture::class)->findBySandwichId($sandwich->getId());
            
            $prixPain = $prixPain->getPrix();

            $temp_prix = array();
            foreach ($prixGarniture as $key2)
            {
                $prixGarniture2 = $this->getDoctrine()->getRepository(Garniture::class)->find($key2["garniture_id"]);
                array_push($temp_prix,$prixGarniture2);
            }
           
            $prixTotal = 0;
            $prixTotal += $prixPain;
            foreach ($temp_prix as $key3)
            {
                $prixTotal += $key3->getPrix();
            }

            $panier_content[$i]["nom_sandwich"] = $sandwich->getNom();
            $panier_content[$i]["prix_sandwich"] = $prixTotal;

            $i++;
        }
        // dump($panier_content);
        
        return $this->render('AppBundle:Compte:panier.html.twig', ["panier_content" => $panier_content, "panier_id" => $id_panier]);

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
    
    public function saveCurrentPanierAction()
    {
        $id = $this->getUser();
        if(!isset($id) || empty($id))
        {
            throw new Exception('Impossible d\'accéder à votre identifiant d\'utilisateur. Etes vous bien connecté !?');
        }

        return new Response('true');
        // dump($_POST);
    }

    // NO ROUTE DEFINED FOR NOW !
    // A refaire avec une méthode dans le repo.
    public function validateCommandeAction()
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
