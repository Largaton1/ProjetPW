<?php
class EditLicencieController {
    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;
 
    public function __construct(LicencieDAO $licencieDAO, ContactDAO $contactDAO, CategorieDAO $categorieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
    }
    public function index($id){
        $licencie = $this->licencieDAO->getById($id);
        include('../../views/licencie/edit_licencie.php');
    }
 
    public function update($id) {
        // Récupérer le licencié à modifier en utilisant son ID
        $licencie = $this->licencieDAO->getById($id);                   
        $contacts = $this->contactDAO->getAll();
        $categories = $this->categorieDAO->getAll();
        
 
        if (!$licencie) {
            // Le licencié n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencié n'a pas été trouvé.";
            return;
        }
 
        // Récupérer la liste des contacts et catégories pour les menus déroulants
        $contacts = $this->contactDAO->getAll();
        $categories = $this->categorieDAO->getAll();
        
 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numeroLicencie = $_POST['numero_licencie'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            // $contact = $_POST['contact_id'];
            // $categorie= $_POST['categorie_id'];
            
          // Récupérer les objets Contact et Categorie
             $contact = $this->contactDAO->getById($id);
            $categorie = $this->categorieDAO->getById($id);
            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du licencié
            $licencie->setNumeroLicencie($numeroLicencie);
            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);
            // Définir les objets Contact et Categorie dans le licencié
            $licencie->setContact($contact);
          
            $licencie->setCategorie($categorie);
 
            // Appeler la méthode du modèle (LicencieDAO) pour mettre à jour le licencié
            // if ($this->licencieDAO->update($licencie)) {
            //     // Rediriger vers la page de détails du licencié après la modification
            //     header('Location: ../licencie/IndexLicencieController.php ');
            //     exit();
            // } else {
            //     // Gérer les erreurs de mise à jour du licencié
            //     echo "Erreur lors de la modification du licencié.";
            //     header('Location: ../licencie/IndexLicencieController.php ');
            // }
          
            $resultatMiseAJour = $this->licencieDAO->update($licencie);
           
            //Appeler la méthode du modèlei(categorieDAO) pour mettre à jour li categorie
            if ($resultatMiseAJour) {
                
                // Rediriger vers la page de détails di categorie après la modification
                echo"licencie modifiée avec succès";
               
                header('Location: ../licencie/IndexLicencieController.php');
                exit();
                
            } else {
                // Gérer les erreurs de mise à jour di categorie
                echo "Erreur lors de la modification de la catégorie.";
                header('Location: ../licencie/IndexLicencieController.php');
                exit();
            }
        }
        
 
        // Inclure la vue pour afficher le formulaire de modification du licencié avec les menus déroulants
        include('../../Views/licencie/edit_licencie.php');
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
 
$licencieDAO = new LicencieDAO(new Connexion());
$contactDAO = new ContactDAO(new Connexion());
$categorieDAO = new CategorieDAO(new Connexion());
 
$controller = new EditLicencieController($licencieDAO, $contactDAO, $categorieDAO);
// $controller->update($_GET['licencie_id']);
// $licencie_id = isset($_GET['licencie_id']);

// if ($licencie_id === null) {
//     echo "L'ID n'est pas défini dans l'URL.";
//     return;
// }
// if(!isset($_POST['action'])){
//     $controller->index($_GET["Id"]);
// } else{
//     $id = $_POST['licencie_id'];
//     $controller->update($id);
// }
$controller->update($_GET['Id']);
$id = isset($_GET['licencie_id']) ? $_GET['licencie_id'] : null;

if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}


?>
 