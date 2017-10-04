<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Garniture;
use AppBundle\Entity\Pain;
use AppBundle\Entity\Sandwich;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadSandwichData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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
        $garnitureRepository = $em->getRepository(Garniture::class);
        $painRepository = $em->getRepository(Pain::class);

        $pains = $painRepository->findAll();
        $garnitures = $garnitureRepository->findAll();

        $sandwich = new Sandwich();
        $sandwich->setNom('Un sandwich au Jambon fromage');
        $sandwich->setPain($pains[0]);
        $sandwich->setCarteMenu(null);
        $sandwich->setUtilisateurConcepteur(null);
        $sandwich->addGarniture($garnitures[1]);
        $sandwich->addGarniture($garnitures[2]);
        $sandwich->addGarniture($garnitures[3]);
        $manager->persist($sandwich);

        $sandwich1 = new Sandwich();
        $sandwich1->setNom('Un sandwich Poulet andalouse');
        $sandwich1->setPain($pains[1]);
        $sandwich1->setCarteMenu(null);
        $sandwich1->setUtilisateurConcepteur(null);
        $sandwich1->addGarniture($garnitures[12]);
        $sandwich1->addGarniture($garnitures[0]);
        $sandwich1->addGarniture($garnitures[4]);
        $manager->persist($sandwich1);

        $sandwich2 = new Sandwich();
        $sandwich2->setNom('Un sandwich au Thom Mayo');
        $sandwich2->setPain($pains[0]);
        $sandwich2->setCarteMenu(null);
        $sandwich2->setUtilisateurConcepteur(null);
        $sandwich2->addGarniture($garnitures[15]);
        $sandwich2->addGarniture($garnitures[11]);
        $sandwich2->addGarniture($garnitures[1]);
        $manager->persist($sandwich2);


        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }
}