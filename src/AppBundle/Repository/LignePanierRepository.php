<?php
namespace AppBundle\Repository;
/**
 * LignePanierRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LignePanierRepository extends \Doctrine\ORM\EntityRepository
{
    // PRoblem here !
    public function find_lines($panier_id)
    {
     	// dump($panier_id);

     	$sql =
     	'
     	SELECT * FROM ligne_panier WHERE ligne_panier.panier_id = :panier_id
     	';

        $em = $this->getEntityManager();
        $dbh = $em->getConnection();
        $query = $dbh->prepare($sql);
        $results = $query->execute([":panier_id" => $panier_id]);
        $results = $query->fetchAll();

        // dump($results);

        return $results;
    }

    public function update($ligne)
    {

        dump($ligne);
        $sql = '
                    UPDATE ligne_panier
                    SET pu_article = :prix, quantite = :quantite
                    WHERE id = :id_ligne
        ';

        $em = $this->getEntityManager();
        $dbh = $em->getConnection();
        $query = $dbh->prepare($sql);
        $results = $query->execute([ "id_ligne" => $ligne->id,":prix" => $ligne->prix_sandwich], ":quantite" => $ligne->quantite);
        return true;
    }
}