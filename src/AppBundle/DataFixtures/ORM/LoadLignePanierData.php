<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\LignePanier;
use AppBundle\Entity\Panier;
use AppBundle\Entity\Sandwich;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadLignePanierData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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
        $PanierRepository = $em->getRepository(Panier::class);

        $sandwichs = $SandwichRepository->findAll();
        $paniers = $PanierRepository->findAll();


        $lignePanier1 = new LignePanier();
        $lignePanier1->setPanier($paniers[0]);
        $lignePanier1->setSandwich($sandwichs[0]);
        $lignePanier1->setQuantite(3);
        $manager->persist($lignePanier1);

        $lignePanier2 = new LignePanier();
        $lignePanier2->setPanier($paniers[0]);
        $lignePanier2->setSandwich($sandwichs[1]);
        $lignePanier2->setQuantite(1);
        $manager->persist($lignePanier2);

        $lignePanier3 = new LignePanier();
        $lignePanier3->setPanier($paniers[1]);
        $lignePanier3->setSandwich($sandwichs[2]);
        $lignePanier3->setQuantite(2);
        $manager->persist($lignePanier3);

        $lignePanier3 = new LignePanier();
        $lignePanier3->setPanier($paniers[2]);
        $lignePanier3->setSandwich($sandwichs[1]);
        $lignePanier3->setQuantite(1);
        $manager->persist($lignePanier3);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 10;
    }
}