<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\TypeGarniture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadTypeGarnitureData extends AbstractFixture implements OrderedFixtureInterface
{



    public function load(ObjectManager $manager)
    {

        $typeGarniture1 = new TypeGarniture();
        $typeGarniture1->setNom('Crudité');
        $manager->persist($typeGarniture1);

        $typeGarniture2 = new TypeGarniture();
        $typeGarniture2->setNom('Viande');
        $manager->persist($typeGarniture2);

        $typeGarniture3 = new TypeGarniture();
        $typeGarniture3->setNom('Poisson');
        $manager->persist($typeGarniture3);

        $typeGarniture4 = new TypeGarniture();
        $typeGarniture4->setNom('Fromage');
        $manager->persist($typeGarniture4);

        $typeGarniture5 = new TypeGarniture();
        $typeGarniture5->setNom('Huiles et Sauces');
        $manager->persist($typeGarniture5);

        $typeGarniture6 = new TypeGarniture();
        $typeGarniture6->setNom('Autres');
        $manager->persist($typeGarniture6);



        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 5;
    }
}