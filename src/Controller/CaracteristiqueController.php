<?php

namespace App\Controller;

use App\Entity\Caracteristique;
use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CaracteristiqueController extends AbstractController
{
    /**
     * @Route("/caracteristique/{id}", name="caracteristique")
     */
    public function index(Caracteristique $caracteristique, Product $product): Response
    {
        return $this->render('chat/product/caracteristique/index.html.twig', [
            'caracteristique' => $caracteristique,
            'product' => $product,
        ]);
    }
}
