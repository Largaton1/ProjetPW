<?php
class IndexLicencieController {
    private $licencieDAO;
    
    
  
 
    public function __construct(LicencieDAO $licencieDAO ) {
        $this->licencieDAO = $licencieDAO;
      
    }
 
    public function index() {
        // Récupérer la liste de tous les licenciés depuis le modèle
        $licencies = $this->licencieDAO->getAll();
 
       
        // Inclure la vue pour afficher la liste des licenciés
        include('../../views/licencie/index_licencie.php');
    
    }
    public function importerLicenciés ($cheminFichier) {
        $this->licencieDAO->importer($cheminFichier);
      }
}
 
require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Licencie.php");
require_once("../../classes/dao/LicencieDAO.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/ContactDAO.php");
require_once("../../classes/models/Categorie.php");
require_once("../../classes/dao/CategorieDAO.php");
$licencieDAO=new LicencieDAO(new Connexion());

$controller=new IndexLicencieController($licencieDAO);

$controller->index();
 
?>