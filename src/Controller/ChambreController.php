<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChambreController extends AbstractController
{
    /**
     * @Route("/voir-les-chambres", name="show_chambres", methods={"GET"})
     */
    public function showChambres(EntityManagerInterface $entityManager): Response
    {   
        return $this->render("chambre/show_chambres.html.twig");
    }
}
