<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Ville;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadVilleData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {

        $ville1 = new Ville();
        $ville1->setLocalite('Beez');
        $ville1->setCodePostal('5000');
        $manager->persist($ville1);

        $ville2 = new Ville();
        $ville2->setLocalite('Namur');
        $ville2->setCodePostal('5000');
        $manager->persist($ville2);

        $ville2 = new Ville();
        $ville2->setLocalite('Belgrade');
        $ville2->setCodePostal('5001');
        $manager->persist($ville2);

        $ville3 = new Ville();
        $ville3->setLocalite('Saint-Servais');
        $ville3->setCodePostal('5002');
        $manager->persist($ville3);

        $ville4 = new Ville();
        $ville4->setLocalite('Saint-Marc');
        $ville4->setCodePostal('5003');
        $manager->persist($ville4);

        $ville5 = new Ville();
        $ville5->setLocalite('Bouge');
        $ville5->setCodePostal('5004');
        $manager->persist($ville5);

        $ville6 = new Ville();
        $ville->setLocalite('Vedrin');
        $ville->setCodePostal('5020');
        $manager->persist($ville6);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}