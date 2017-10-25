<?php

namespace ApiBundle\Controller;

use AppBundle\Entity\CarteMenu;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;

class MenusController extends Controller
{
    /**
     * @Rest\View(serializerGroups={"menu"})
     * @Rest\Get("/menus", name="api_menus", options={ "method_prefix" = false })
     */
    public function getMenusAction()
    {
        $menus = $this->getDoctrine()
            ->getRepository(CarteMenu::class)
            ->findAll();

        return $menus;
    }

    /**
     * @Rest\View(serializerGroups={"menu"})
     * @Rest\Get("/menus/{menu_id}", name="api_menus_one", options={ "method_prefix" = false })
     */
    public function getMenuAction($menu_id)
    {
        $menu = $this->getDoctrine()
            ->getRepository(CarteMenu::class)
            ->find($menu_id);

        if (empty($menu)) {
            return $this->json(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }


        return $menu;
    }

    /**
     * @Rest\View(serializerGroups={"menu"})
     * @Rest\Get("/menus/{menu_id}/sandwichs", name="api_menus_sandwichs", options={ "method_prefix" = false })
     */
    public function getMenuSandwichAction($menu_id)
    {
        $menu = $this->getDoctrine()
            ->getRepository(CarteMenu::class)
            ->getSandwichMenu($menu_id);

        if (empty($menu)) {
            return $this->json(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }


        return $menu;
    }
}
