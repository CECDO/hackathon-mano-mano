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
        return $this->render('chat/product/price/index.html.twig', [
            'materiaux' => $materiaux,
            'product' => $product,
            'caracteristique' => $caracteristique,
        ]);
    }

    /**
     * @Route("/priceNo/{id}", name="priceNo")
     */
    public function indexNo(Materiaux $materiaux, Product $product, Caracteristique $caracteristique): Response
    {
        return $this->render('chat/product/price/indexNo.html.twig', [
            'materiaux' => $materiaux,
            'product' => $product,
            'caracteristique' => $caracteristique,
        ]);
    }

    /**
     * @Route("/priceBis/{id}", name="priceBis")
     */
    public function indexBis(Materiaux $materiaux, Product $product, Caracteristique $caracteristique): Response
    {
        return $this->render('chat/product/price/indexBis.html.twig', [
            'materiaux' => $materiaux,
            'product' => $product,
            'caracteristique' => $caracteristique,
        ]);
    }
}
