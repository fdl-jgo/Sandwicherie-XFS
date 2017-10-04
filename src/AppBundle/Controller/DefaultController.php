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

    public function loginAction()
    {
    	return $this->render('AppBundle::login_page.html.twig');
    }

    public function inscriptionAction()
    {
    	return $this->render('AppBundle::inscription_form.html.twig');
    }
}
