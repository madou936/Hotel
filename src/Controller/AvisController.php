<?php

namespace App\Controller;

use DateTime;
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
     * @Route("/avis", name="create_avis", methods={"GET|POST"})
     */
    public function createAvis(EntityManagerInterface $entityManager, Request $request): Response
    {   
      $avis = new Avis();

        $form = $this->createForm(AvisFormType::class, $avis)
        ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $avis->setCreatedAt(new DateTime());
            $avis->setUpdatedAt(new DateTime());

            $entityManager->persist($avis);
            $entityManager->flush();


            $this->addFlash('success', "L'avis' a bien été ajouté");
            return $this->redirectToRoute('default_home');
        }

        return $this->render("avis/create_avis.html.twig", [
            'form' => $form->createView()
        ]);
     }

    }

