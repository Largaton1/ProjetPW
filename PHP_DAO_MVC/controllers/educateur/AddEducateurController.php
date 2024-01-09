<?php

class AddEducateurController
{
    private $educateurDAO;
    private $licencieDAO;

    public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
        $this->educateurDAO = $educateurDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function index(){
        $licences = $this->licencieDAO->getAll();
        include('../../views/educateurs/add_educateur.php');
    }

    public function addEducateur(){
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $licencie_id = $_POST['licencie_id'];
                $email = $_POST['email'];
                $password = $_POST['mot_de_passe'];
                $est_administrateur = $_POST['est_administrateur'];

                // Valider les données du formulaire
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo 'Email invalid';
                    return;
                }

                if($this->educateurDAO->getByEmail($email)){
                    echo 'Cet educateur existe déjà !';
                    return;
                }

                // Hasher le mot de passe
                $hpassword = password_hash($password, PASSWORD_DEFAULT);
                $educateur = new Educateur("", $licencie_id, $email, $hpassword, $est_administrateur  == "oui" ? 1 : 0);
                if ($this->educateurDAO->create($educateur)) {
                    // Rediriger vers la page d'accueil après l'ajout
                    header('Location:../educateur/IndexEducateurController.php');
                    exit();
                } else {
                    // Gérer les erreurs d'ajout de l'educateur
                    echo "Erreur lors de l'ajout de l'educateur.";
                }
            }
        } catch (Exception $e){
            die("Erreur  : " . $e->getMessage());
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
$controller = new AddEducateurController($educateurDAO, $licencieDAO);

if(!isset($_POST['action'])){
    $controller->index();
} else{
   $controller->addEducateur();
}

?>