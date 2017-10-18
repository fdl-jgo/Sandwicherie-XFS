<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\CarteMenu;
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
        $painRepository = $em->getRepository(Pain::class);
        $carteRepository = $em->getRepository(CarteMenu::class);

        $pains = $painRepository->findAll(["id" => ASC]);
        $carteMenus = $carteRepository->findAll(["id" => ASC]);

        $sandwich = new Sandwich();
        $sandwich->setNom('Un sandwich au Jambon fromage');
        $sandwich->setPain($pains[0]);
        $sandwich->setCarteMenu(null);
        $sandwich->setUtilisateurConcepteur(null);
        $sandwich->setCarteMenu($carteMenus[0]);
        $manager->persist($sandwich);

        $sandwich1 = new Sandwich();
        $sandwich1->setNom('Un sandwich Poulet andalouse');
        $sandwich1->setPain($pains[1]);
        $sandwich1->setCarteMenu(null);
        $sandwich1->setUtilisateurConcepteur(null);
        $sandwich1->setCarteMenu($carteMenus[0]);
        $manager->persist($sandwich1);

        $sandwich3 = new Sandwich();
        $sandwich3->setNom('Un sandwich au Thon Mayo');
        $sandwich3->setPain($pains[3]);
        $sandwich3->setCarteMenu(null);
        $sandwich3->setUtilisateurConcepteur(null);
        $manager->persist($sandwich3);

        $sandwich4 = new Sandwich();
        $sandwich4->setNom('Un sandwich végétarien');
        $sandwich4->setPain($pains[3]);
        $sandwich4->setCarteMenu(null);
        $sandwich4->setUtilisateurConcepteur(null);
        $sandwich4->setCarteMenu($carteMenus[0]);
        $manager->persist($sandwich4);

        $sandwich5 = new Sandwich();
        $sandwich5->setNom('Un Club');
        $sandwich5->setPain($pains[4]);
        $sandwich5->setCarteMenu(null);
        $sandwich5->setUtilisateurConcepteur(null);
        $sandwich5->setCarteMenu($carteMenus[0]);
        $manager->persist($sandwich5);


        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 7;
    }
}