<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="chat_category_all")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('chat/categories/index.html.twig',[
            'categories' => $categoryRepository->findAll()
        ]);
    }

    /**
     * @Route("/category/{id}", name="chat_category_id")
     */
    public function show(Category $category): Response
    {
        return $this->render('chat/categories/show.html.twig', [
            'category' => $category
        ]
    );
    }
}
