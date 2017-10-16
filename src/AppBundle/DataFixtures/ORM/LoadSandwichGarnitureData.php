<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Garniture;
use AppBundle\Entity\Sandwich;
use AppBundle\Entity\SandwichGarniture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadSandwichGarnitureData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{

//    const MAX_NB_ADRESSE = 5;

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
        $SandwichRepository = $em->getRepository(Sandwich::class);
        $GarnitureRepository = $em->getRepository(Garniture::class);

        $sandwichs = $SandwichRepository->findAll();
        $garnitures = $GarnitureRepository->findAll();



        $manager->persist($this->fireEntity($sandwichs, $garnitures, 0, 0, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 0, 1, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 0, 3, 2));


        $manager->persist($this->fireEntity($sandwichs, $garnitures, 1, 0, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 1, 1, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 1, 12, 1));


        $manager->persist($this->fireEntity($sandwichs, $garnitures, 2, 0, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 2, 2, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 2, 3, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 2, 11, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 2, 15, 1));


        $manager->persist($this->fireEntity($sandwichs, $garnitures, 3, 3, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 3, 8, 1));


        $manager->persist($this->fireEntity($sandwichs, $garnitures, 4, 4, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 4, 5, 1));
        $manager->persist($this->fireEntity($sandwichs, $garnitures, 4, 7, 1));

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 8;
    }

    private function fireEntity($_sandwichs, $_garnitures, $_idSandwich, $_idGarniture, $_nbQuatite)
    {
        $sandwichGarniture = new SandwichGarniture();
        $sandwichGarniture->setGarniture($_garnitures[$_idGarniture]);
        $sandwichGarniture->setSandwich($_sandwichs[$_idSandwich]);
        $sandwichGarniture->setQuantite($_nbQuatite);
        return $sandwichGarniture;
    }
}