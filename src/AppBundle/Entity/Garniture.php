<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Garniture
 *
 * @ORM\Table(name="garniture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GarnitureRepository")
 */
class Garniture
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"garniture", "menu", "sandwich"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Groups({"garniture", "menu", "sandwich"})
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     * @Groups({"garniture", "menu", "sandwich"})
     */
    private $prix;

    /**
     *
     * @ORM\ManyToOne(targetEntity="TypeGarniture")
     * @ORM\JoinColumn(name="type_garniture_id", referencedColumnName="id")
     * @Groups({"garniture", "menu", "sandwich"})
     */
    private $typeGarniture;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Garniture
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Garniture
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set typeGarniture
     *
     * @param \AppBundle\Entity\TypeGarniture $typeGarniture
     *
     * @return Garniture
     */
    public function setTypeGarniture(\AppBundle\Entity\TypeGarniture $typeGarniture = null)
    {
        $this->typeGarniture = $typeGarniture;

        return $this;
    }

    /**
     * Get typeGarniture
     *
     * @return \AppBundle\Entity\TypeGarniture
     */
    public function getTypeGarniture()
    {
        return $this->typeGarniture;
    }
}
