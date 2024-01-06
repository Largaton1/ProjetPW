<?php
// Import des fichiers requis
require_once("../config/config.php");
require_once("../config/connexion.php");
require_once("../classes/models/Educateur.php");
require_once("../classes/dao/EducateurDAO.php");

// Début de la définition de la classe LoginController
class LoginController
{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO) {
        $this->educateurDAO = $educateurDAO;
    }

    public function index(){
        // Redirection vers la page de login
         header("Location:index.php");  
        
    }

    public function connect(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Validation du formulaire
            if (isset($email) &&  isset($password)) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo 'Il faut un email valide pour soumettre le formulaire.';
                    return;
                }

                $educateur = $this->educateurDAO->getByEmail($email);

                if ($educateur && ($educateur->getEstAdministrateur() != 1 || !password_verify($password, $educateur->getMotDePasse()))) {
                    echo "Les informations envoyées ne permettent pas de vous identifier !";
                    return;
                }

                // Création d'une session et redirection vers la page d'accueil
                session_start();
                $_SESSION['loggedin'] = true;
                echo"bj";
                // header("Location:");
            }
        }
    }
}

// Création d'une instance de EducateurDAO et du contrôleur
$educateurDAO = new EducateurDAO(new Connexion());
$controller = new LoginController($educateurDAO);

// Vérification des actions à exécuter
if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->connect();
}
?>