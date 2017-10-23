<?php

namespace ApiBundle\Controller;


use AppBundle\Entity\Pain;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;

class PainsController extends Controller
{
    /**
     * @Rest\View(serializerGroups={"pain"})
     * @Rest\Get("/pains", name="api_pains", options={ "method_prefix" = false })
     */
    public function getPainsAction()
    {
        $pains = $this->getDoctrine()
            ->getRepository(Pain::class)
            ->findAll();

        return $pains;
    }

    /**
     * @Rest\View(serializerGroups={"pain"})
     * @Rest\Get("/pains/{pain_id}", name="api_pains_one", options={ "method_prefix" = false })
     */
    public function getPainAction($pain_id)
    {
        $pain = $this->getDoctrine()
            ->getRepository(Pain::class)
            ->find($pain_id);

        if (empty($pain)) {
            return $this->json(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }


        return $pain;
    }
}
