<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Commande;
use AppBundle\Entity\Panier;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadCommandeData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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
        $PanierRepository = $em->getRepository(Panier::class);

        $paniers = $PanierRepository->findAll();


        $commande = new Commande();
        $commande->setPanier($paniers[0]);
        $commande->setProcessed(true);
        $commande->setLivree(false);
        $manager->persist($commande);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 10;
    }
}