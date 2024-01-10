<?php
// Import des fichiers requis

// Début de la définition de la classe LoginController
class LoginController
{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function index(){
        session_start();
        // Si l'utilisateur est déjà connecté, redirigez-le vers la page d'accueil des
        if (isset($_SESSION['email'])) {
            header('Location:../controllers/licencie/IndexLicencieController.php');
            exit();
        }
        // Redirection vers la page de login
         header("Location:index.php");  
        
    }

    public function connect(){
        if (isset($_SESSION['email'])) {
            header('Location: educateur/IndexEducateurController.php');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $educateurs =$this->educateurDAO ->getAll();
            $email = $_POST['email'];
            $mot_de_passe= $_POST['mot_de_passe'];
          
        
            // Validation du formulaire
            if (isset($email) &&  isset($mot_de_passe)) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo 'Il faut un email valide pour soumettre le formulaire.';
                    return;
                }

                $educateur = $this->educateurDAO->getByEmail($email);

                if ($educateur && ($educateur->getEstAdministrateur() != 1 || !password_verify($mot_de_passe, $educateur->getMotDePasse()))) {
                    echo "Les informations envoyées ne permettent pas de vous identifier !";
                    return;
                }

                // Création d'une session et redirection vers la page d'accueil
                session_start();
                $_SESSION['loggedin'] = true;
          
                header('Location:../controllers/licencie/IndexLicencieController.php');

            }
        }

    }
  
}
require_once("../config/config.php");
require_once("../config/connexion.php");
require_once("../classes/models/Educateur.php");
require_once("../classes/dao/EducateurDAO.php");

// Création d'une instance de EducateurDAO et du contrôleur
$educateurDAO = new EducateurDAO(new Connexion());
$controller = new LoginController($educateurDAO);


if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->connect();
}


?>