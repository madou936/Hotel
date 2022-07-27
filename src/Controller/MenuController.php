<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="app_menu", methods={"GET"})
     */
    public function showMenu(EntityManagerInterface $entityManager): Response
    {
        return $this->render('menu/show_menu.html.twig'
      );
    }
}
