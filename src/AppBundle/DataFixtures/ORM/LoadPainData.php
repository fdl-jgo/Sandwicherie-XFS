<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Pain;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadPainData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {

        $pain1 = new Pain();
        $pain1->setNom("pain1");
        $pain1->setPrix(1.05);
        $manager->persist($pain1);

        $pain2 = new Pain();
        $pain2->setNom("pain2");
        $pain2->setPrix(1.50);
        $manager->persist($pain2);

        $pain3 = new Pain();
        $pain3->setNom("pain3");
        $pain3->setPrix(2.05);
        $manager->persist($pain3);

        $pain4 = new Pain();
        $pain4->setNom("Bagels");
        $pain4->setPrix(1.05);
        $manager->persist($pain4);

        $pain5 = new Pain();
        $pain5->setNom("Mantou");
        $pain5->setPrix(1.15);
        $manager->persist($pain5);



        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }
}