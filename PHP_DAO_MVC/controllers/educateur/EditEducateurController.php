<?php

class EditEducateurController {
    private $educateurDAO;
    private $licencieDAO;

    public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
        $this->educateurDAO = $educateurDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function index($id){
        $educateur = $this->educateurDAO->getById($id);
        $licencies = $this->licencieDAO->getAll();

        include('../../views/educateurs/edit_educateur.php');
    }
   

    public function editEducateur($id) {
        try {
            // Récupérer l'educateur à modifier en utilisant son ID
   
            $educateur = $this->educateurDAO->getById($id);
            
   
            if (!$educateur) {
                echo "L'educateur n'a pas été trouvé.";
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
              
                $email = $_POST['email'];
                // $mot_de_passe = $_POST['mot_de_passe'];
                // $hmot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $est_administrateur = $_POST['est_administrateur'];
                $licencie_id= $_POST['licencie_id'];
                // Valider les données du formulaire (ajoutez des validations si nécessaire)

                // Mettre à jour les détails du contact
   
                $educateur->setEmail($email);
                // $educateur->setMotDePasse($hmot_de_passe);
                $educateur->setEstAdministrateur($est_administrateur  == 'oui' ? 1 : 0);
                $educateur->setIdLicencie($licencie_id);
                
                $resultatMiseAJour = $this->educateurDAO->update($educateur);
         
                //Appeler la méthode du modèlei(categorieDAO) pour mettre à jour li categorie
                if ($resultatMiseAJour) {
                    
                    // Rediriger vers la page de détails di categorie après la modification
                    echo"educateur modifiée avec succès";
                   
                    header('Location: ../educateur/IndexEducateurController.php');
                    exit();
                    
                } else {
                    // Gérer les erreurs de mise à jour di categorie
                    echo "Erreur lors de la modification de la catégorie.";
                    header('Location: ../educateur/IndexEducateurController.php');
                    exit();
                }
            
            }
        } catch (Exception $e) {
            echo "Une erreur est survenue: " . $e->getMessage();
        }
    }

   
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Educateur.php");
require_once("../../classes/models/Licencie.php");
require_once("../../classes/dao/EducateurDAO.php");
require_once("../../classes/dao/LicencieDAO.php");

$educateurDAO = new EducateurDAO(new Connexion());
$licencieDAO = new LicencieDAO(new Connexion());
$controller = new EditEducateurController($educateurDAO, $licencieDAO);
// if(!isset($_POST['action'])){
//     $controller->index($_GET["Id"]);
// } else{
//     $id = $_POST['educateur_id'];
//     $controller->update($id);
// }

// $controller->editEducateur($_GET['Id']);
// $id = isset($_GET['Id']) ? $_GET['Id'] : null;

// if ($id === null) {
//     echo "L'ID n'est pas défini dans l'URL.";
//     return;
// }

if(!isset($_POST['action'])){
    $controller->index($_GET["Id"]);
} else{
    $id = $_POST['educateur_id'];
    $controller->editEducateur($id);
}


?>