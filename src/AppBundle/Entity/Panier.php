<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     */
    private $utilisateur;

    /**
     *
     * @ORM\OneToMany(targetEntity="LignePanier", mappedBy="panier")
     */
    private $lignesPanier;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lignesPanier = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Panier
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Add lignesPanier
     *
     * @param \AppBundle\Entity\LignePanier $lignesPanier
     *
     * @return Panier
     */
    public function addLignesPanier(\AppBundle\Entity\LignePanier $lignesPanier)
    {
        $this->lignesPanier[] = $lignesPanier;

        return $this;
    }

    /**
     * Remove lignesPanier
     *
     * @param \AppBundle\Entity\LignePanier $lignesPanier
     */
    public function removeLignesPanier(\AppBundle\Entity\LignePanier $lignesPanier)
    {
        $this->lignesPanier->removeElement($lignesPanier);
    }

    /**
     * Get lignesPanier
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLignesPanier()
    {
        return $this->lignesPanier;
    }
}
