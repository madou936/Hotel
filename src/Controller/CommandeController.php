<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    /**
     * @Route("/voir-les-commandes", name="show_commandes", methods={"GET"})
     */
    public function showCommandes(EntityManagerInterface $entityManager): Response
    {   
        return $this->render("commande/show_commandes.html.twig");
    }
    
}
