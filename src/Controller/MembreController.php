<?php

namespace App\Controller;

use DateTime;
use App\Entity\Membre;
use App\Form\RegisterFormType;
use App\Form\ChangePasswordFormType;
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

        $form = $this->createForm(RegisterFormType::class, $membre)
        ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $membre->setCreatedAt(new DateTime());
            $membre->setUpdatedAt(new DateTime());
            $membre->setRoles(['ROLE_USER']);

            $plainPassword = $form->get('password')->getData();
            $membre->setPassword($passwordHasher->hashPassword($membre,$plainPassword));
            

            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('default_home');
        }

        return $this->render("membre/register.html.twig", [
            'form' =>$form->createView()
        ]);
 
    }

    /**
     * @Route("profil/mon-espace-perso", name="show_profile", methods={"GET"})
     */
    public function showProfile(): Response
    {
        return $this->render("membre/show_profile.html.twig");
    }

    /**
     * @Route("profil/changer-mdp/{id}", name="change_password", methods={"GET|POST"})
     */
    public function changePassword(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, Request $request): Response
    {
        $form = $this->createForm(ChangePasswordFormType::class)->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            /** @var Membre $user */
            $user = $entityManager->getRepository(Membre::class)->findOneBy(['id' => $this->getUser()]);

            $user->setUpdatedAt(new DateTime());

            $user->setPassword($passwordHasher->hashPassword(
                $user, $form->get('plainPassword')->getData()));

            $entityManager->persist($user);
            $entityManager->flush();
            
            $this->addFlash('success', "Votre mot de passe a bien été changé");
            return $this->redirectToRoute('show_profile');
        }

        return $this->render('membre/change_password.html.twig', [
            'form' => $form->createView(),
            'action' => 'modif'
        ]);
    }
}
