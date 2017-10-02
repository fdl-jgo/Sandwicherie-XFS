<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Utilisateur;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


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

        $userManager = $this->container->get('fos_user.user_manager');

        for ($i = 1; $i <= self::MAX_NB_USER; $i++ ){

            $user = $userManager->createUser();
            $varuser = "user".$i;
            $user->setUsername($varuser);
            $user->setEmail($varuser . "@mail.be");
            $user->setPlainPassword($varuser);
            $user->setEnabled(true);

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }
}