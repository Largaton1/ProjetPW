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
    #[Route(path: '/index/{entite}', name: 'app_index_licencie', methods:['GET'])]
    public function index(CategorieRepository $categorieRepository, Request $request): Response
    {
        $categories =$categorieRepository->findAllCategorie();
      $entite = $request->get('entite');
    
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'categories' => $categories,
            'entite'=>$entite,
        ]);
    }


    #[Route('index_licencie_categorie/{id}', name: 'app_index_licencie_categorie')]
    
    public function indexLicencieParCategorie(LicencieRepository $licencieRepository,CategorieRepository $categorieRepository,int $id): Response
    {
        
      
      $licenciesCategories = $licencieRepository->getLicenciesByCategories($id);

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


    #[Route('index_contact_categorie/{id}', name: 'app_index_contact_categorie')]
    public function contactCategorie(ContactRepository $contactRepository,CategorieRepository $categorieRepository,int $id): Response
    {
        
      
      $contactsCategories = $contactRepository->getContactsByCategories($id);

      $categorie = $categorieRepository->findOneCategorie($id);
      
      if(count($categorie)>0)
      {
        $libelleCategorie=$categorie[0]['nom'];
      }
      
       
        return $this->render('index/contact.html.twig', [
            'controller_name' => 'IndexController',
            'contactsCategories' => $contactsCategories,
            'libelleCategorie' => $libelleCategorie,

        ]);
    }

}
