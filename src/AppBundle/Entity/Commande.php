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
}

