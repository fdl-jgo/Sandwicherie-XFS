<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function testfidelAction()
    {

        $repository = $this->getDoctrine()
            ->getRepository(Ville::class);

        $val = $repository->findAll();
        dump($val);
        return $this->render('AppBundle:Default:testfidel.html.twig', [
            'var' => ' '
        ]);
    }
}
