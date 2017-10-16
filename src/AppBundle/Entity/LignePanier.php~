<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LignePanier
 *
 * @ORM\Table(name="ligne_panier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LignePanierRepository")
 */
class LignePanier
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
     * @var int
     *
     * @ORM\Column(name="quantite", type="smallint", options={"default":1})
     */
    private $quantite;

    /**
     * @var Sandwich
     *
     * @ORM\ManyToOne(targetEntity="Sandwich")
     * @ORM\JoinColumn(name="sandwich_id", referencedColumnName="id")
     */
    private $sandwich;

    /**
     * @var Panier
     *
     * @ORM\ManyToOne(targetEntity="Panier", inversedBy="lignesPanier")
     * @ORM\JoinColumn(name="panier_id", referencedColumnName="id")
     */
    private $panier;


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
     * Set lignePanier
     *
     * @param \AppBundle\Entity\LignePanier $lignePanier
     *
     * @return LignePanier
     */
    public function setLignePanier(\AppBundle\Entity\LignePanier $lignePanier = null)
    {
        $this->lignePanier = $lignePanier;

        return $this;
    }

    /**
     * Get lignePanier
     *
     * @return \AppBundle\Entity\LignePanier
     */
    public function getLignePanier()
    {
        return $this->lignePanier;
    }

    /**
     * Set panier
     *
     * @param \AppBundle\Entity\Panier $panier
     *
     * @return LignePanier
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
     * Set sandwich
     *
     * @param \AppBundle\Entity\Sandwich $sandwich
     *
     * @return LignePanier
     */
    public function setSandwich(\AppBundle\Entity\Sandwich $sandwich = null)
    {
        $this->sandwich = $sandwich;

        return $this;
    }

    /**
     * Get sandwich
     *
     * @return \AppBundle\Entity\Sandwich
     */
    public function getSandwich()
    {
        return $this->sandwich;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return LignePanier
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}
