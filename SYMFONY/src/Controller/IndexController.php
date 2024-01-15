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


    #[Route('{id}/liste_licencie_categorie', name: 'app_liste_licencie_categorie')]
    
    public function indexLicencieParCategorie(LicencieRepository $licencieRepository,CategorieRepository $categorieRepository,int $id): Response
    {
        
      
      $licenciesCategories = $licencieRepository->findAllLicenciesCategories($id);

      $categorie = $categorieRepository->findOneCategorie($id);
      
      if(count($categorie)>0)
      {
        $libelleCategorie=$categorie[0]['nom'];
      }
      
       
      
        return $this->render('index/licencie.html.twig', [
            'controller_name' => 'IndexController',
            'licenciesCategories' => $licenciesCategories,
            'libelleCategorie' => $libelleCategorie,

        ]);
    }

    public function contactCategorie(ContactRepository $ContactRepository,CategorieRepository $categorieRepository,int $id): Response
    {
        
      
      $contactCategories = $ContactRepository->findAllContactsCategories($id);

      $categorie = $categorieRepository->findOneCategorie($id);
      
      if(count($categorie)>0)
      {
        $libelleCategorie=$categorie[0]['nom'];
      }
      
       
        return $this->render('index/contact.html.twig', [
            'controller_name' => 'IndexController',
            'contactCategories' => $contactCategories,
            'libelleCategorie' => $libelleCategorie,

        ]);
    }

}
