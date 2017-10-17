<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sandwich
 *
 * @ORM\Table(name="sandwich")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SandwichRepository")
 */
class Sandwich
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;


    /**
     * @var CarteMenu
     *
     * @ORM\ManyToOne(targetEntity="CarteMenu", inversedBy="sandwichs")
     * @ORM\JoinColumn(name="carte_menu_id", referencedColumnName="id")
     */
    private $carteMenu;

    /**
     * @var Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumn(name="utilisateur_concepteur_id", referencedColumnName="id")
     */
    private $utilisateurConcepteur;

    /**
     * @var Pain
     *
     * @ORM\ManyToOne(targetEntity="Pain")
     * @ORM\JoinColumn(name="pain_id", referencedColumnName="id")
     */
    private $pain;

    /**
     *
     * @ORM\OneToMany(targetEntity="SandwichGarniture", mappedBy="sandwich")
     */
    private $garnituresSandwich;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->garnituresSandwich = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Sandwich
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
     * Set carteMenu
     *
     * @param \AppBundle\Entity\CarteMenu $carteMenu
     *
     * @return Sandwich
     */
    public function setCarteMenu(\AppBundle\Entity\CarteMenu $carteMenu = null)
    {
        $this->carteMenu = $carteMenu;

        return $this;
    }

    /**
     * Get carteMenu
     *
     * @return \AppBundle\Entity\CarteMenu
     */
    public function getCarteMenu()
    {
        return $this->carteMenu;
    }

    /**
     * Set utilisateurConcepteur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateurConcepteur
     *
     * @return Sandwich
     */
    public function setUtilisateurConcepteur(\AppBundle\Entity\Utilisateur $utilisateurConcepteur = null)
    {
        $this->utilisateurConcepteur = $utilisateurConcepteur;

        return $this;
    }

    /**
     * Get utilisateurConcepteur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateurConcepteur()
    {
        return $this->utilisateurConcepteur;
    }

    /**
     * Set pain
     *
     * @param \AppBundle\Entity\Pain $pain
     *
     * @return Sandwich
     */
    public function setPain(\AppBundle\Entity\Pain $pain = null)
    {
        $this->pain = $pain;

        return $this;
    }

    /**
     * Get pain
     *
     * @return \AppBundle\Entity\Pain
     */
    public function getPain()
    {
        return $this->pain;
    }

    /**
     * Add garnituresSandwich
     *
     * @param \AppBundle\Entity\SandwichGarniture $garnituresSandwich
     *
     * @return Sandwich
     */
    public function addGarnituresSandwich(\AppBundle\Entity\SandwichGarniture $garnituresSandwich)
    {
        $this->garnituresSandwich[] = $garnituresSandwich;

        return $this;
    }

    /**
     * Remove garnituresSandwich
     *
     * @param \AppBundle\Entity\SandwichGarniture $garnituresSandwich
     */
    public function removeGarnituresSandwich(\AppBundle\Entity\SandwichGarniture $garnituresSandwich)
    {
        $this->garnituresSandwich->removeElement($garnituresSandwich);
    }

    /**
     * Get garnituresSandwich
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGarnituresSandwich()
    {
        return $this->garnituresSandwich;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Sandwich
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
