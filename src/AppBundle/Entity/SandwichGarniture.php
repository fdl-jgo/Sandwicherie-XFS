<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LignePanier
 *
 * @ORM\Table(name="sandwich_garniture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SandwichGarnitureRepository")
 */
class SandwichGarniture
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
     * @ORM\ManyToOne(targetEntity="Sandwich", inversedBy="garnituresSandwich")
     * @ORM\JoinColumn(name="sandwich_id", referencedColumnName="id")
     */
    private $sandwich;

    /**
     * @var Garniture
     *
     * @ORM\ManyToOne(targetEntity="Garniture")
     * @ORM\JoinColumn(name="panier_id", referencedColumnName="id")
     */
    private $garniture;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return SandwichGarniture
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

    /**
     * Set sandwich
     *
     * @param \AppBundle\Entity\Sandwich $sandwich
     *
     * @return SandwichGarniture
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
     * Set garniture
     *
     * @param \AppBundle\Entity\Garniture $garniture
     *
     * @return SandwichGarniture
     */
    public function setGarniture(\AppBundle\Entity\Garniture $garniture = null)
    {
        $this->garniture = $garniture;

        return $this;
    }

    /**
     * Get garniture
     *
     * @return \AppBundle\Entity\Garniture
     */
    public function getGarniture()
    {
        return $this->garniture;
    }
}
