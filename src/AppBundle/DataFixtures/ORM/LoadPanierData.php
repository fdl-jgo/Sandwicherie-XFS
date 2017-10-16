<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Panier;
use AppBundle\Entity\Utilisateur;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadPanierData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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
        $UtilisateurRepository = $em->getRepository(Utilisateur::class);

        $utilisateurs = $UtilisateurRepository->findAll();


        $panier1 = new Panier();
        $panier1->setUtilisateur($utilisateurs[1]);
        $manager->persist($panier1);

        $panier2 = new Panier();
        $panier2->setUtilisateur($utilisateurs[2]);
        $manager->persist($panier2);

        $panier3 = new Panier();
        $panier3->setUtilisateur($utilisateurs[3]);
        $manager->persist($panier3);

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 9;
    }
}