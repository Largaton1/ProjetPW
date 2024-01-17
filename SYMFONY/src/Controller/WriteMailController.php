<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Entity\Educateur;
use App\Repository\EducateurRepository;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class WriteMailController extends AbstractController
{
    #[Route('/write/mail/{entite}', name: 'app_write_mail')]
    public function index(EducateurRepository $educateurRepository, ContactRepository $contactRepository, Request $request): Response
    {
        $entite = $request->get('entite');
        $user = $this->getUser();
        
       $recupIdEdu=$user->getUserIdentifier();
       if($entite=='educateur')
       {
        $educateurs = $educateurRepository->findAllEducateurOne($recupIdEdu);
 
       }
       else{
        $educateurs = $contactRepository->findAllMailsContacts();
       }
        return $this->render('write_mail/index.html.twig', [
            'controller_name' => 'WriteMailController',
            'educateurs'=>$educateurs,
            'entite'=>$entite
        ]);
    }
}
