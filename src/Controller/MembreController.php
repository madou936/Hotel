<?php

namespace App\Controller;

use DateTime;
use App\Entity\Membre;
use App\Form\RegisterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class MembreController extends AbstractController
{
    /**
     * @Route("/inscription", name="user_register", methods={"GET|POST"})
     */
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $membre = new Membre();

        $form = $this->createForm(RegisterFormType::class)
        ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $membre->setCreatedAt(new DateTime());
            $membre->setUpdatedAt(new DateTime());
            $membre->setRoles(['ROLE_USER']);

            

            $entityManager->persist($membre);
            // $entityManager->flush();

            return $this->redirectToRoute('default_home');
        }

        return $this->render("membre/register.html.twig", [
            'form' =>$form->createView()
        ]);
 
    }
}
