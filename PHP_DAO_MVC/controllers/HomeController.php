<?php
class HomeController {
    private $CategorieDAO;
    private $ContactDAO;
    private $LicencieDAO;
    private $EducateurDAO;

    public function __construct(CategorieDAO $CategoriesDAO , ContactDAO  $ContactDAO, LicencieDAO $LicencieDAO, EducateurDAO $EducateurDAO ) {
        $this->CategorieDAO = $CategoriesDAO;
        $this->ContactDAO = $ContactDAO;
        $this->LicencieDAO = $LicencieDAO;
        $this->EducateurDAO = $EducateurDAO;
      
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les elements depuis le modÃ¨le
        $categories = $this->CategorieDAO->getAll();
        $contacts = $this->ContactDAO->getAll();
        $licencie = $this->LicencieDAO->getAll();
        $educateur = $this->EducateurDAO->getAll();

        // Inclure la vue pour afficher la liste des categories
        include('../views/categories/home_categorie.php');
          // Inclure la vue pour afficher la liste des contacts

         include('../views/contact/home_contact.php');

          // Inclure la vue pour afficher la liste des licencies

        //   include('../views/licencie/home.php');

             // Inclure la vue pour afficher la liste des educateurs

              include('../views/educateurs/home_educateur.php');


    }
}

require_once("../config/config.php");
require_once("../config/connexion.php");
require_once("../classes/models/Categorie.php");
require_once("../classes/dao/CategorieDAO.php");
require_once("../classes/models/Contact.php");
require_once("../classes/dao/ContactDAO.php");
require_once("../classes/models/Licencie.php");
require_once("../classes/dao/LicencieDAO.php");
require_once("../classes/models/Educateur.php");
require_once("../classes/dao/EducateurDAO.php");

$CategorieDAO=new CategorieDAO(new Connexion());
$ContactDAO=new ContactDAO(new Connexion());
$LicencieDAO=new LicencieDAO(new Connexion());
$EducateurDAO=new EducateurDAO(new Connexion());

$controller=new HomeController($CategorieDAO,$ContactDAO,$LicencieDAO ,$EducateurDAO);

$controller->index();

?>