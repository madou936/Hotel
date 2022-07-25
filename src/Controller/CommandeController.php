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
    public function commande(EntityManagerInterface $entityManager): Response
    {
        return $this->render('commande/commande.html.twig');
    }
}
