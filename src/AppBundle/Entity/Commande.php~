<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @var bool
     *
     * @ORM\Column(name="processed", type="boolean")
     */
    private $processed;

    /**
     * @var bool
     *
     * @ORM\Column(name="livree", type="boolean")
     */
    private $livree;

    /**
     * @var Panier
     *
     * @ORM\ManyToOne(targetEntity="Panier")
     * @ORM\JoinColumn(name="panier_id", referencedColumnName="id")
     */
    private $panier;

    /**
     * @var Adresse
     *
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumn(name="adresse_livraison_id", referencedColumnName="id")
     */
    private $adresseLivraison;


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
     * Set processed
     *
     * @param boolean $processed
     *
     * @return Commande
     */
    public function setProcessed($processed)
    {
        $this->processed = $processed;

        return $this;
    }

    /**
     * Get processed
     *
     * @return bool
     */
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * Set livree
     *
     * @param boolean $livree
     *
     * @return Commande
     */
    public function setLivree($livree)
    {
        $this->livree = $livree;

        return $this;
    }

    /**
     * Get livree
     *
     * @return bool
     */
    public function getLivree()
    {
        return $this->livree;
    }

    /**
     * Set panier
     *
     * @param \AppBundle\Entity\Panier $panier
     *
     * @return Commande
     */
    public function setPanier(\AppBundle\Entity\Panier $panier = null)
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * Get panier
     *
     * @return \AppBundle\Entity\Panier
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * Set adresseLivraison
     *
     * @param \AppBundle\Entity\Adresse $adresseLivraison
     *
     * @return Commande
     */
    public function setAdresseLivraison(\AppBundle\Entity\Adresse $adresseLivraison = null)
    {
        $this->adresseLivraison = $adresseLivraison;

        return $this;
    }

    /**
     * Get adresseLivraison
     *
     * @return \AppBundle\Entity\Adresse
     */
    public function getAdresseLivraison()
    {
        return $this->adresseLivraison;
    }
}
