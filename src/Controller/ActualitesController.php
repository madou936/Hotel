<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActualitesController extends AbstractController
{
    /**
     * @Route("/voir-les-actualites", name="show_actualite", methods={"GET"})
     */
    public function showChambres(EntityManagerInterface $entityManager): Response
    {   
        return $this->render("actualites/show_actualites.html.twig");
    }
}
