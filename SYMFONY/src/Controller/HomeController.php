<?php

namespace App\Controller;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $categorieRepository;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->categorieRepository= $categorieRepository;
    }
    #[Route('/connexion', name: 'app_login')]
    public function index(): Response
    {
        return $this->render('login/login.html.twig');
    }
}
