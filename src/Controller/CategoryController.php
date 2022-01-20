<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Form\SearchProductType;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="chat_category_all")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('chat//product/categories/index.html.twig',[
            'categories' => $categoryRepository->findAll()
        ]);
    }

    /**
     * @Route("/category/{id}", name="chat_category_id")
     */
    public function show(Request $request, Category $category, ProductRepository $productRepository): Response
    {
        $product = [];

        $form = $this->createForm(SearchProductType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData()['search'];
            $product = $productRepository->findBy(['name' => $search]);
        }

        return $this->render('chat//product/categories/show.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
            'products' => $product,
        ]
    );
    }
}
