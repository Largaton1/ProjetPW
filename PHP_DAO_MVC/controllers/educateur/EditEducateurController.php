<?php
class EditEducateurController {
    private $educateurDAO;
    private $licencieDAO;

    public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
        $this->educateurDAO = $educateurDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function index($id){
        $licence = $this->licencieDAO->getAll();
        $educateur = $this->educateurDAO->getById($id);
        include('../../views/educateur/edit_educateur.php');
    }

    public function editEducateur($id) {
        try {
            // Récupérer le contact à modifier en utilisant son ID
            print_r($id);
            $educateur = $this->educateurDAO->getById($id);

            if (!$educateur) {
                echo "L'educateur n'a pas été trouvé.";
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $numero_licence = $_POST['numero_licence'];
                $email = $_POST['email'];
                $est_administrateur = $_POST['est_administrateur'];

            
                // Mettre à jour les détails du contact
                $educateur->setNumeroLicence($numero_licence);
                $educateur->setEmail($email);
                $educateur->setEstAdministrateur($est_administrateur  == 'oui' ? 1 : 0);
                if ($this->educateurDAO->update($educateur)) {
                    // Rediriger vers la page de détails après la modification
                    header('Location:HomeEducateurController.php');
                    exit();
                } else {
                    // Gérer les erreurs de mise à jour
                    echo "Erreur lors de la modification";
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
if(!isset($_POST['action'])){
    $controller->index($_GET["id"]);
} else{
    $id = $_POST['id'];
    $controller->editEducateur($id);
}

?>