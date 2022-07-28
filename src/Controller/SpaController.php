<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SpaController extends AbstractController
{
    /**
     * @Route("/spa", name="show_spa", methods={"GET"})
     */
    public function showSpa(EntityManagerInterface $entityManager): Response
    {
        return $this->render('spa/show_spa.html.twig', [
            'controller_name' => 'SpaController',
        ]);
    }
}
