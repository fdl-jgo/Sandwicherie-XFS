<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Adresse;
use AppBundle\Entity\Ville;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadAdresseData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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
        $villeRepository = $em->getRepository(Ville::class);

        $villes = $villeRepository->findAll();

        $adresse1 = new Adresse();
        $adresse1->setRue('Rue de la poteresse');
        $adresse1->setNumero('5'); //Beez
        $adresse1->setVille($villes[0]);
        $manager->persist($adresse1);

        $adresse2 = new Adresse();
        $adresse2->setRue("Avenue marie d'Artois");
        $adresse2->setNumero('42'); //Namur
        $adresse2->setVille($villes[1]);
        $manager->persist($adresse2);

        $adresse3 = new Adresse();
        $adresse3->setRue('rue Antoine Nelis');
        $adresse3->setNumero('14'); //belgrade
        $adresse3->setVille($villes[2]);
        $manager->persist($adresse3);

        $adresse4 = new Adresse();
        $adresse4->setRue('Ch. de WATERLOO');
        $adresse4->setNumero('2'); //st servais
        $adresse4->setVille($villes[3]);
        $manager->persist($adresse4);

        $adresse5 = new Adresse();
        $adresse5->setRue('rue des Colonies');
        $adresse5->setNumero('50'); //st marc
        $adresse5->setVille($villes[4]);
        $manager->persist($adresse5);

        $adresse6 = new Adresse();
        $adresse6->setRue('av Baudouin 1er');
        $adresse6->setNumero('17'); //bouge
        $adresse6->setVille($villes[5]);
        $manager->persist($adresse6);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 2;
    }
}