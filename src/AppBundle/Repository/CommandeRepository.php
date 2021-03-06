<?php

namespace AppBundle\Repository;

/**
 * CommandeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommandeRepository extends \Doctrine\ORM\EntityRepository
{
	public function getAllCommandesForUser($id_user)
	{
		dump($id_user);
		$sql = '	SELECT commande.*,
					(SELECT SUM(ligne_panier.quantite) FROM ligne_panier WHERE ligne_panier.panier_id = commande.panier_id) AS nb_article,
					(SELECT SUM(ligne_panier.quantite * ligne_panier.pu_article) FROM ligne_panier WHERE ligne_panier.panier_id = commande.panier_id) AS prix
					FROM commande
					LEFT JOIN panier ON commande.panier_id = panier.id
					LEFT JOIN ligne_panier ON ligne_panier.panier_id = commande.panier_id
					WHERE panier.utilisateur_id = :id_user
					ORDER BY date DESC';

		$em = $this->getEntityManager();
		$dbh = $em->getConnection();
		$query = $dbh->prepare($sql);
		$results = $query->execute([":id_user" => $id_user]);
		$results = $query->fetchAll();
		dump($results);
		return $results;
	}

	public function insert($commande)
	{

		// dump($commande);

		$sql = 'INSERT INTO commande VALUES ( null , :id_panier, :id_address, :processed, :livre, NOW())';

		$em = $this->getEntityManager();
		$dbh = $em->getConnection();
		$query = $dbh->prepare($sql);
		
		$results = $query->execute([
										":id_panier" => $commande->getPanier()->getId(),
										":id_address" => $commande->getAdresseLivraison() ?  $commande->getAdresseLivraison()->getId() : null,
										":processed" => $commande->getProcessed(),
										":livre" => $commande->getLivree(),
									]);

		// dump($query);
		return true;
	}
}
