<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FooterController extends AbstractController
{
    /**
     * @Route("/mentions-legales", name="show_mentions", methods={"GET"})
     */
    public function showMentions(): Response
    {
        return $this->render("include/footer/_mentions.html.twig");
    }
    
    /**
     * @Route("/cgv", name="show_cgv", methods={"GET"})
     */
    public function showCgv(): Response
    {
        return $this->render("include/footer/_cgv.html.twig");
    }
}