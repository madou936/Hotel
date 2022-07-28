<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HotelMapController extends AbstractController
{
    /**
     * @Route("/hotel/map", name="show_hotel_map", methods={"GET"})
     */
    public function showHotel(EntityManagerInterface $entityManager): Response
    {   
        return $this->render("hotel_map/hotelmap.html.twig");
    }
}
