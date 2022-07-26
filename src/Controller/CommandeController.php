<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    /**
     * @Route("/voir-les-commande", name="show_commande", methods={"GET"})
     */
    public function showCommande(EntityManagerInterface $entityManager): Response
    {   
        return $this->render("commande/show_commande.html.twig");
    }
    
}
