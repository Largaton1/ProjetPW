<?php
class AddLicencieController {
    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;

    public function __construct(licencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        
        $contacts =$this->contactDAO->getAll();
        $categories =$this->categorieDAO->getAll();
        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/licencie/add_licencie.php');
    }
    
   
    public function addLicencie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numero_licencie = $_POST['numero_licencie'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $contactId = $_POST['contact_id'];
            $categorieId=$_POST['categorie_id'];
    
            // Valider les données du formulaire (ajoutez des validations si nécessaire)
    
            // Récupérer l'objet Contact correspondant à partir de l'ID
            
            $contact =$this->contactDAO->getById($contactId);
                // Récupérer l'objet categorie correspondant à partir de l'ID
            $categorie =$this->categorieDAO->getById($categorieId);
            if (!$contact) {
                // Gérer le cas où le contact n'est pas trouvé
                echo "Erreur : Le contact n'a pas été trouvé.";
                return;
                // header('Location: ../../views/404.php');
                // exit();
            }
    
            // Vérifier si le contact est défini avant de créer le nouvel objet Licencie
            if ($contact) {
                // Créer un nouvel objet Licencie avec les données du formulaire
                $newLicencie = new Licencie(0, $numero_licencie, $nom, $prenom, $contact, $categorie);
    
                // Appeler la méthode du modèle (LicencieDAO) pour ajouter le contact
                if ($this->licencieDAO->create($newLicencie)) {
                    // Rediriger vers la page d'accueil après l'ajout
                    echo "Licencié ajouté";
                    header('Location: ../../controllers/licencie/IndexLicencieController.php');
                    exit();
                } else {
                    // Gérer les erreurs d'ajout 
                    echo "Erreur lors de l'ajout du licencié.";
                    header('Location: ../../controllers/licencie/IndexLicencieController.php');
                    exit();
                }
            }
        }
          // Récupérer la liste des contacts et des catégories
          $contacts = $this->contactDAO->getAll();
          $categories = $this->categorieDAO->getAll();
    
        // Inclure la vue pour afficher le formulaire d'ajout
        include('../../views/licencie/add_licencie.php');
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
$contactDAO=new ContactDAO(new Connexion());
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new AddLicencieController($licencieDAO,$contactDAO,$categorieDAO);
if(!isset($_POST['action'])){
$controller->index();
}else{
$controller->addLicencie();
}


?>