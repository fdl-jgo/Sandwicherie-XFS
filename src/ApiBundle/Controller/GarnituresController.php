<?php

namespace ApiBundle\Controller;


use AppBundle\Entity\Garniture;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;

class GarnituresController extends Controller
{
    /**
     * @Rest\View(serializerGroups={"garniture"})
     * @Rest\Get("/garnitures", name="api_garnitures", options={ "method_prefix" = false })
     */
    public function getGarnituresAction()
    {
        $garnitures = $this->getDoctrine()
            ->getRepository(Garniture::class)
            ->findAll();

        return $garnitures;
    }

    /**
     * @Rest\View(serializerGroups={"garniture"})
     * @Rest\Get("/garnitures/{garniture_id}", name="api_garnitures_one", options={ "method_prefix" = false })
     */
    public function getGarnitureAction($garniture_id)
    {
        $garniture = $this->getDoctrine()
            ->getRepository(Garniture::class)
            ->find($garniture_id);

        if (empty($garniture)) {
            return $this->json(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }


        return $garniture;
    }
}
