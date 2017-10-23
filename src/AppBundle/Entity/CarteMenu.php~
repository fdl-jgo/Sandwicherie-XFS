<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * CarteMenu
 *
 * @ORM\Table(name="carte_menu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarteMenuRepository")
 */
class CarteMenu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"menu"})
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Groups({"menu"})
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Sandwich", mappedBy="carteMenu")
     * @Groups({"menu"})
     */
    private $sandwichs;

    public function __construct() {
        $this->sandwichs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return CarteMenu
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
     * Add sandwich
     *
     * @param \AppBundle\Entity\Sandwich $sandwich
     *
     * @return CarteMenu
     */
    public function addSandwich(\AppBundle\Entity\Sandwich $sandwich)
    {
        $this->sandwichs[] = $sandwich;

        return $this;
    }

    /**
     * Remove sandwich
     *
     * @param \AppBundle\Entity\Sandwich $sandwich
     */
    public function removeSandwich(\AppBundle\Entity\Sandwich $sandwich)
    {
        $this->sandwichs->removeElement($sandwich);
    }

    /**
     * Get sandwichs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSandwichs()
    {
        return $this->sandwichs;
    }
}
