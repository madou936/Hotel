<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Form\MembreFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class MembreController extends AbstractController
{
    /**
     * @Route("/inscriptpion", name="user_register", methods={"GET|POST"})
     */
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        // 1
    //    $membre = new Membre();
        // 2
    //    $form = $this->createForm(MembreFormType::class)
    //    ->handleRequest($request);


     //    3
     return $this->render("membre/register.html.twig", [
        // 'form' =>$form->createView()
     ]);
 
    }
     
}
