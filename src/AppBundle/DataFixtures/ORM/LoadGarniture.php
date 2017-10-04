<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Garniture;
use AppBundle\Entity\TypeGarniture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadGarnitureData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{

    const MAX_NB_ADRESSE = 5;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }


    public function load(ObjectManager $manager)
    {
        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $typeGarnitureRepository = $em->getRepository(TypeGarniture::class);
//
        $typeGarnitures = $typeGarnitureRepository->findAll();

        $garniture1 = new Garniture();
        $garniture1->setNom('Tomate');
        $garniture1->setTypeGarniture($typeGarnitures[0]);
        $garniture1->setPrix(0.3);
        $manager->persist($garniture1);

        $garniture2 = new Garniture();
        $garniture2->setNom('Salade');
        $garniture2->setTypeGarniture($typeGarnitures[0]);
        $garniture2->setPrix(0.5);
        $manager->persist($garniture2);

        $garniture3 = new Garniture();
        $garniture3->setNom('Jambon');
        $garniture3->setTypeGarniture($typeGarnitures[1]);
        $garniture3->setPrix(0.5);
        $manager->persist($garniture3);

        $garniture4 = new Garniture();
        $garniture4->setNom('Fromage');
        $garniture4->setTypeGarniture($typeGarnitures[3]);
        $garniture4->setPrix(0.4);
        $manager->persist($garniture4);

        $garniture5 = new Garniture();
        $garniture5->setNom('Oeuf dur');
        $garniture5->setTypeGarniture($typeGarnitures[5]);
        $garniture5->setPrix(0.35);
        $manager->persist($garniture5);

        $garniture6 = new Garniture();
        $garniture6->setNom('Fromage de chèvre');
        $garniture6->setTypeGarniture($typeGarnitures[3]);
        $garniture6->setPrix(0.5);
        $manager->persist($garniture6);

        $garniture7 = new Garniture();
        $garniture7->setNom('Avocat');
        $garniture7->setTypeGarniture($typeGarnitures[0]);
        $garniture7->setPrix(0.4);
        $manager->persist($garniture7);

        $garniture8 = new Garniture();
        $garniture8->setNom('Rosbif');
        $garniture8->setTypeGarniture($typeGarnitures[1]);
        $garniture8->setPrix(0.75);
        $manager->persist($garniture8);

        $garniture9 = new Garniture();
        $garniture9->setNom('Dinde');
        $garniture9->setTypeGarniture($typeGarnitures[1]);
        $garniture9->setPrix(0.75);
        $manager->persist($garniture9);

        $garniture10 = new Garniture();
        $garniture10->setNom('Poulet curry');
        $garniture10->setTypeGarniture($typeGarnitures[1]);
        $garniture10->setPrix(0.5);
        $manager->persist($garniture10);

        $garniture11 = new Garniture();
        $garniture11->setNom('Saumon fumé');
        $garniture11->setTypeGarniture($typeGarnitures[2]);
        $garniture11->setPrix(1);
        $manager->persist($garniture11);

        $garniture12 = new Garniture();
        $garniture12->setNom('Thon');
        $garniture12->setTypeGarniture($typeGarnitures[2]);
        $garniture12->setPrix(0.5);
        $manager->persist($garniture12);

        $garniture13 = new Garniture();
        $garniture13->setNom('Poulet andalouse');
        $garniture13->setTypeGarniture($typeGarnitures[1]);
        $garniture13->setPrix(0.5);
        $manager->persist($garniture13);

        $garniture14 = new Garniture();
        $garniture14->setNom('Huile d\'olive');
        $garniture14->setTypeGarniture($typeGarnitures[4]);
        $garniture14->setPrix(0.2);
        $manager->persist($garniture14);

        $garniture15 = new Garniture();
        $garniture15->setNom('Carottes rapées');
        $garniture15->setTypeGarniture($typeGarnitures[0]);
        $garniture15->setPrix(0.3);
        $manager->persist($garniture15);

        $garniture16 = new Garniture();
        $garniture16->setNom('Mayonnaise');
        $garniture16->setTypeGarniture($typeGarnitures[5]);
        $garniture16->setPrix(0.4);
        $manager->persist($garniture16);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 6;
    }
}