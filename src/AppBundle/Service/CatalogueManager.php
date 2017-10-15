<?php

namespace AppBundle\Service;

use AppBundle\Entity\CarteMenu;
use Doctrine\Common\Persistence\ObjectManager;

class CatalogueManager
{

    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function getCarteMenu()
    {
        $repository = $this->manager->getRepository(CarteMenu::class);

        return $repository->findAll();
    }
}