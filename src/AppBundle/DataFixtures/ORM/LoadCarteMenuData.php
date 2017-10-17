<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\CarteMenu;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadCarteMenuData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {

        $carte1 = new CarteMenu();
        $carte1->setNom("Sandwiche classiques");
        $manager->persist($carte1);



        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 0;
    }
}