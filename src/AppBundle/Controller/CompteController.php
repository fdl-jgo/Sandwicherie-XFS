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
use AppBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CompteController extends Controller
{

    // Fonctions de vues / pages 

    // @Xavier
    public function commandeAction($id)
    {
        $commande = $this->getDoctrine()->getRepository(Commande::class)->find($id);
        // dump($commande);

        $id = $this->getUser();
        // Verification que l'utilisateur est connecté et qu'on peut bien recuperer son id.
        if(!isset($id) || empty($id))
        {
            throw new Exception('Impossible d\'accéder à votre identifiant d\'utilisateur. Etes vous bien connecté !?');
        }

        // Recuperation du panier en DB. (infos de base)
        // dump($commande);
        $panier = $this->getDoctrine()->getRepository(Panier::class)->find($commande->getPanier()->getId());

        // Si aucun panier n'a été trouvé.
        if(!isset($panier) || empty($panier))
        {
            throw new Exception('Aucun panier vous appartenant n\'a été trouvé !');
        }
        else
        {
            // Récupération du contenu du panier
            $id_panier = $panier->getId();
            $panier_content = $this->getDoctrine()->getRepository(LignePanier::class)->find_lines($id_panier);
        }

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

        // dump($commande);
        return $this->render('AppBundle:Compte:commande.html.twig', ["panier" => $panier_content, "commande" => $commande]);
    }

    // @Xavier
     public function historiqueAction()
    {
        $id = $this->getUser();
        if(!isset($id) || empty($id))
        {
            throw new Exception('Impossible d\'accéder à votre identifiant d\'utilisateur. Etes vous bien connecté !?');
        }


        $liste_commande = $this->getDoctrine()->getRepository(Commande::class)->getAllCommandesForUser($id->getId());
        dump($liste_commande);
        return $this->render('AppBundle:Compte:historique.html.twig', ["liste_commande" => $liste_commande]);
    }

    // @Xavier
    public function panierAction()
    {

        $id = $this->getUser();
        // Verification que l'utilisateur est connecté et qu'on peut bien recuperer son id.
        if(!isset($id) || empty($id))
        {
            throw new Exception('Impossible d\'accéder à votre identifiant d\'utilisateur. Etes vous bien connecté !?');
        }

        // Recuperation du panier en DB. (infos de base)
        $panier = $this->getDoctrine()->getRepository(Panier::class)->getPanierForUser($id);

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


        $panier = $this->getDoctrine()->getRepository(Panier::class)->getPanierForUser($id);

        if(!isset($panier) || empty($panier))
        {
            throw new Exception('Aucun panier vous appartenant n\'a été trouvé !');
            // Creer un nouveau panier.

            // $panier = new Panier();

            // Probleme : Contenu du panier vide ...... Et pas les infos pour les faire.
            // (Devrait être fait en JS / ajax sur la partie de fidel ? )
        }
        else
        {
            // Récupération du contenu du panier
            $id_panier = $panier[0]->getId();
            $panier_content = $this->getDoctrine()->getRepository(LignePanier::class)->find_lines($id_panier);
        }

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

        $LignePanierRepository = $this->getDoctrine()->getRepository(LignePanier::class);
        foreach ($panier_content as $key)
        {
            $LignePanierRepository->update((Object)$key);
        }


    //     // LIGNE DE PANIER !!!
    //     public function savePanierForUser($user_id, $panier_infos)
    //     {
    //     $sql = "
    //                 INSERT INTO
    //                 VALUES 
    //     ";

    //     $em = $this->getEntityManager();
    //     $dbh = $em->getConnection();
        
    //     $query = $dbh->prepare($sql);
    //     $query->execute();
    // }

        return new Response('true');
        // dump($_POST);
    }

    // NO ROUTE DEFINED FOR NOW !
    // A refaire avec une méthode dans le repo.
    public function validerCommandeAction($id)
    {
        // RECUPERATION DU PANIER : 
        $id = $this->getUser();
        // Verification que l'utilisateur est connecté et qu'on peut bien recuperer son id.
        if(!isset($id) || empty($id))
        {
            throw new Exception('Impossible d\'accéder à votre identifiant d\'utilisateur. Etes vous bien connecté !?');
        }

        // Recuperation du panier en DB. (infos de base)
        $panier = $this->getDoctrine()->getRepository(Panier::class)->getPanierForUser($id);

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

        // MAJ des lignes de panier pour ajouter le prix de chaque ligne (le tout forme maintenant une commande.)
        $LignePanierRepository = $this->getDoctrine()->getRepository(LignePanier::class);
        foreach($panier_content as $key)
        {
            $LignePanierRepository->update((Object)$key);
        }
        // dump($panier);
        $commande = new Commande();
        $commande->setPanier($panier[0]);
        $commande->setProcessed(false);
        $commande->setLivree(false);

        $CommandeRepository = $this->getDoctrine()->getRepository(Commande::class)->insert($commande);


        // return new RedirectResponse($this->generateUrl(''));

        $response = new Response("<p>Votre commande a bien été prise en compte. <br />Vous serez redirigé vers l'historique des commandes dans 5s.</p>");

        $response->setStatusCode(200);
        $response->headers->set('Refresh', '5; '. $this->generateUrl('historique'));

        // $response->send();

        return $response;
        // REtourner une vue ! 
    }
}
