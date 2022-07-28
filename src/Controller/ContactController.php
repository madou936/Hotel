<?php

namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController


{
    /**
     * @Route("/contact", name="app_contact", methods={"GET|POST"})
     */
      public function contact(Request $request,EntityManagerInterface  $entityManager)
    { 
       
          
        

       
        $contact = new Contact();

        $form = $this->createForm(ContactFormType::class, $contact)
        ->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $contactFormData = $form->getData();
            

            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('default_home');
        }

        return $this->render("contact/show_contact.html.twig", [
            'contact' => $contact
        ]); 
    }
}
