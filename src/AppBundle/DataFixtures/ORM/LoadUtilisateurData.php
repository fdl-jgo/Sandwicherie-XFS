<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Adresse;
use AppBundle\Entity\Utilisateur;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;


use AppBundle\Entity\Activite;

class LoadUtilisateurData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{

    const MAX_NB_USER = 4;

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
        $faker = Factory::create('fr_BE');

        $userManager = $this->container->get('fos_user.user_manager');

        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $adresseRepository = $em->getRepository(Adresse::class);

        $adresses = $adresseRepository->findAll();

        for ($i = 1; $i <= self::MAX_NB_USER; $i++ ){

            $user = $userManager->createUser();

            $username = $faker->userName;

            $user->setUsername($username);
            $user->setEmail($username . "@mail.be");
            $user->setPlainPassword($username);
            $user->setEnabled(true);
            $user->setAdresse($adresses[$i]);

            $manager->persist($user);
        }

        $user = $userManager->createUser();

        $user->setUsername("Xavier");
        $user->setEmail("Xavier" . "@mail.be");
        $user->setPlainPassword("password");
        $user->setEnabled(true);
        $user->setAdresse("Rue joseph lemineur 11");

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 3;
    }
}