<?php

namespace App\Controller;


use DateTime;
use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController


{
    /**
     * @Route("/contact", name="create_contact", methods={"GET|POST"})
     */
      public function createContact(Request $request,EntityManagerInterface  $entityManager):Response
    { 
       
          
        

       
        $contact = new Contact();

        $form = $this->createForm(ContactFormType::class, $contact)
        ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            
            $contact->setCreatedAd(new DateTime());
            $contact->setUpdatedAd(new DateTime());

            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('default_home');
        }

        return $this->render("contact/create_contact.html.twig", [
            'form' => $form->createView()
        ]); 
    }
}
