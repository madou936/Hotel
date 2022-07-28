<?php

namespace App\Controller;

use DateTime;
use App\Entity\Commande;
use App\Form\CommandeFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    
    /**
     * @Route("reserver-une-chambre", name="book_commandes", methods={"GET|POST"})
     */
    public function bookCommandes(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commande = new Commande;

        $form = $this->createForm(CommandeFormType::class, $commande)
            ->handleRequest($request);

        $price = 50;
        if($form->isSubmitted() && $form->isValid()) {

            $commande->setCreatedAt(new DateTime());
            $commande->setUpdatedAt(new DateTime());

            $entityManager->persist($commande);
            $entityManager->flush();

            $this->addFlash('success', "Merci, votre résérvation a bien été effectué !");
            return $this->redirectToRoute('default_home');
        }

        return $this->render("commande/show_commandes.html.twig", [
            'form' => $form->createView()    
        ]);

    }
    
}
