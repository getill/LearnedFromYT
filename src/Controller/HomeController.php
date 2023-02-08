<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    // Configuration de la route home (celle de base). La méthode get permet de sécuriser le site (Un tout petit peu sécurisé mais c'est un début)
    #[Route('/', 'home.index', methods: ['GET'])]

    // Ici on fait une fonction qui va rendre la template de la page home
    public function index(
        RecipeRepository $recipeRepository
    ): Response {
        // render vient de abstract controller et nous permet d'afficher le twig
        return $this->render('pages/home.html.twig', [
            'recipes' => $recipeRepository->findPublicRecipe(3)
        ]);
    }
}
