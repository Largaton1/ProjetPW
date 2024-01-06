<?php
    class LoginController
    {
        private $educateurDAO;

        public function __construct(EducateurDAO $educateurDAO) {
            $this->educateurDAO = $educateurDAO;
        }

        public function index(){
             header("Location:../PHP_DAO_MVC");
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

            

                    if ($educateur->getEstAdministrateur() != 1 || password_verify($password, $educateur->getMotDePasse()) != 1 ){
                        echo "Les informations envoyées ne permettent pas de vous identifier !";
                        return;
                    }

                    // Creer une session et redireger l'utilisateur vers la page d'acceuil
                    session_start();
                    $_SESSION['loggedin'] = true;
                     header("Location:../PHP_DAO_MVC");
                }

            }
        }
    }

require_once("config/config.php");
require_once("config/connexion.php");
require_once("classes/models/Educateur.php");
require_once("classes/dao/EducateurDAO.php");

$educateurDAO = new EducateurDAO(new Connexion());
$controller = new LoginController($educateurDAO);

if(!isset($_POST['action'])){
    $controller->index();
} else{
    $controller->connect();
}
