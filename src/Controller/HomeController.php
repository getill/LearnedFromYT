<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    // Configuration de la route home (celle de base)
    #[Route('/', 'home.index', methods: ['GET'])]

    // Ici on fait une fonction qui va rendre la template de la page home
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }
}
