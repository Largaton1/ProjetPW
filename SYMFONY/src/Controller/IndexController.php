<?php

namespace App\Controller;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\ContactRepository;
use App\Repository\LicencieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private CategorieRepository $categorieRepository;
    private LicencieRepository $licencieRepository;
    private ContactRepository $contactRepository;

    
    public function __construct(CategorieRepository $categorieRepository, LicencieRepository $licencieRepository, ContactRepository $contactRepository)
    {
        $this->categorieRepository = $categorieRepository;
        $this->licencieRepository = $licencieRepository;
        $this->contactRepository = $contactRepository;
    }
    #[Route(path: '/index', name: 'app_index', methods:['GET'])]
    public function index(CategorieRepository $categorieRepository, Request $request): Response
    {
        $categories = $this->categorieRepository->findAll();
      $entitie = $request->get('entitie');
        

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'categories' => $categories,
            'entitie'=>$entitie,
        ]);
    }

    #[Route(path: '/index/licencie', name: 'app_index_licencie')]
    public function licencie(Request $request): Response {
        $id = $request->query->get('licencie');
        $id = $request->query->get('categorie');
        
         // Récupérer les données du licencié en utilisant l'ID
    $licencie = $this->licencieRepository->find($id);
    
    // Récupérer les informations sur la catégorie en utilisant l'ID
    $categorie = $this->categorieRepository->find($id);

        return $this->render('index/licencie.html.twig',
            [
                'licencie' => $licencie,
                "categorie" => $categorie,
            ]
        );
    }

}
