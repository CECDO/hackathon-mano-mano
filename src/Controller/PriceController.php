<?php

namespace App\Controller;

use App\Entity\Caracteristique;
use App\Entity\Materiaux;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PriceController extends AbstractController
{
    /**
     * @Route("/price/{id}", name="price")
     */
    public function index(Materiaux $materiaux, Product $product, Caracteristique $caracteristique): Response
    {
        return $this->render('chat/price/index.html.twig', [
            'materiaux' => $materiaux,
            'product' => $product,
            'caracteristique' => $caracteristique,
        ]);
    }
}
