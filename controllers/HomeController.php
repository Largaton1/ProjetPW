<?php
class HomeController {
    private $categorieDAO;
    private $contactDAO;
    private $licencieDAO;
    private $educateurDAO;

    public function __construct(CategorieDAO $categorieDAO , ContactDAO  $contactDAO, LicencieDAO $licencieDAO, EducateurDAO $educateurDAO ) {
        $this->categorieDAO = $categorieDAO;
        $this->contactDAO = $contactDAO;
        $this->licencieDAO = $licencieDAO;
        $this->educateurDAO = $educateurDAO;
      
    }

    public function index() {
        
        $categorie = $this->categorieDAO->getAll();
        $contact = $this->contactDAO->getAll();
        $licencie = $this->licencieDAO->getAll();
        $educateur = $this->educateurDAO->getAll();

        include('../views/categories/home.php');
          // Affichage des contacts

         include('../views/contact/home.php');

          // Affichage des licencies

          include('../views/licencies/home.php');

             // Affichage des educateurs

             include('../views/educateur/home.php');


    }
}

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Categories.php");
require_once("../classes/dao/CategoriesDAO.php");
require_once("../classes/models/Contact.php");
require_once("../classes/dao/ContactDAO.php");
require_once("../classes/models/Licencie.php");
require_once("../classes/dao/LicencieDAO.php");
require_once("../classes/models/Educateur.php");
require_once("../classes/dao/EducateurDAO.php");

$CategoriesDAO=new CategorieDAO(new Connexion());
$ContactDAO=new ContactDAO(new Connexion());
$LicencieDAO=new LicencieDAO(new Connexion());
$EducateursDAO=new EducateurDAO(new Connexion());

$controller=new HomeController($CategorieDAO,$ContactDAO,$LicencieDAO ,$EducateurDAO);

$controller->index();

?>