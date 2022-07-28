<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="show_avis", methods={"GET|POST"})
     */
    public function showAvis(EntityManagerInterface $entityManager, Request $request): Response
    {   
      $avis = new Avis();

        $form = $this->createForm(AvisFormType::class, $avis)
        ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($avis);
            $entityManager->flush();

            return $this->redirectToRoute('default_home');
        }

        return $this->render("avis/show_avis.html.twig", [
            'avis' => $avis
        ]);
     }

    }

