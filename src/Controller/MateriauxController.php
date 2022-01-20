<?php

namespace App\Controller;

use App\Entity\Caracteristique;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MateriauxController extends AbstractController
{
    /**
     * @Route("/materiaux/{name}", name="materiaux")
     */
    public function index(Caracteristique $caracteristique): Response
    {
        return $this->render('chat/materiaux/index.html.twig', [
            'caracteristique' => $caracteristique
        ]);
    }
}
