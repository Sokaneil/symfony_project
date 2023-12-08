<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articleArray = $articleRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'User',
            'ecole' => 'Bienvenue à l\'École 89',
            'articles' => $articleArray,
        ]);
    }
}
