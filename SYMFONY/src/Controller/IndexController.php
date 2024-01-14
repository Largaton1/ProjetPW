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
    #[Route(path: '/index', name: 'app_index')]
    public function IndexParCategory(Request $request): Response
    {
        $categories = $this->categorieRepository->findAll();
        $form = $this->createFormBuilder()
            ->add('liste', ChoiceType::class, [
                'choices' => [
                    'Licencié' => 'licencie',
                    'Contact' => 'contact',
                ],
                'multiple' => false,
                'expanded' => false,
            ]) ->add('categorie', ChoiceType::class, [
                'choices' => $categories,
                'choice_label' => 'nom',
                'choice_value' => 'id',
                'multiple' => false,
                'expanded' => false,
            ]) ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $list = $data['liste'];
            $categorie = $data['categorie'];
            if($list == 'contact') {
                $contacts = $this->contactRepository->getContactsByCategory($categorie->getId());
                return $this->render('index/contact.html.twig', ["contacts" => $contacts, "categorie" => $categorie]);
            } else {
                $licencie = $this->licencieRepository->findBy(["categorie" => $categorie->getId()]);
                return $this->render('index/licencie.html.twig', ["licencie" => $licencie, "categorie" => $categorie]);
            }
        }

        return $this->render('index/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: '/index/licencie', name: 'app_index_licencie')]
    public function licencie(Request $request): Response {
        $licencie = $request->query->get('licencie');
        $categorie = $request->query->get('licencie');
        return $this->render('index/licencie.html.twig',
            [
                'licencie' => $licencie,
                "categorie" => $categorie,
            ]
        );
    }

}
