<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Adresse;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadAdresseData extends AbstractFixture implements OrderedFixtureInterface
{

    const MAX_NB_ADRESSE = 5;


    public function load(ObjectManager $manager)
    {


        $adresse1 = new Adresse();
        $adresse1->setRue('Rue de la poteresse');
        $adresse1->setNumero('5'); //Beez
        $manager->persist($adresse1);

        $adresse2 = new Adresse();
        $adresse2->setRue("Avenue marie d'Artois");
        $adresse2->setNumero('42'); //Namur
        $manager->persist($adresse2);

        $adresse3 = new Adresse();
        $adresse3->setRue('rue Antoine Nelis');
        $adresse3->setNumero('14'); //belgrade
        $manager->persist($adresse3);

        $adresse4 = new Adresse();
        $adresse4->setRue('Ch. de WATERLOO');
        $adresse4->setNumero('2'); //st servais
        $manager->persist($adresse4);

        $adresse5 = new Adresse();
        $adresse5->setRue('rue des Colonies');
        $adresse5->setNumero('50'); //st marc
        $manager->persist($adresse5);

        $adresse6 = new Adresse();
        $adresse6->setRue('av Baudouin 1er');
        $adresse6->setNumero('17'); //bouge
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