<?php

namespace ApiBundle\Controller;


use AppBundle\Entity\Sandwich;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;

class SandwichsController extends Controller
{
    /**
     * @Rest\View(serializerGroups={"sandwich"})
     * @Rest\Get("/sandwichs", name="api_sandwichs", options={ "method_prefix" = false })
     */
    public function getSandwichsAction()
    {
        $sandwichs = $this->getDoctrine()
            ->getRepository(Sandwich::class)
            ->findAll();

        return $sandwichs;
    }

    /**
     * @Rest\View(serializerGroups={"sandwich"})
     * @Rest\Get("/sandwichs/{sandwich_id}", name="api_sandwichs_one", options={ "method_prefix" = false })
     */
    public function getSandwichAction($sandwich_id)
    {
        $sandwich = $this->getDoctrine()
            ->getRepository(Sandwich::class)
            ->find($sandwich_id);

        if (empty($sandwich)) {
            return $this->json(['message' => 'Sandwich not found'], Response::HTTP_NOT_FOUND);
        }


        return $sandwich;
    }

}
