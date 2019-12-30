<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category", name="category_")
 *
 */

class CategoryController extends AbstractController
{
    /**
     * @Route("/{id}", name="index")
     */
    public function index(Category $category):Response
    {
        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }

    public function renderNavBar(CategoryRepository $categoryRepository): Response
    {
        return $this->render('Bricks/navbar.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}
