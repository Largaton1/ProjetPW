<?php

class AddContactController
{
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index(){
        include('../../views/contact/add_contact.php');
    }

    public function ajoutContact(){
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $telephone = $_POST['telephone'];

                //Validation
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo 'Email invalid';
                    return;
                }

               

                // Creation de nouveau contact
                $contact = new Contact("", $nom, $prenom, $email, $telephone);
                if ($this->contactDAO->create($contact)) {
                    // Redirection
                    header('Location:IndexContactController.php');
                    exit();
                } else {
                    // En cas d'erreur
                    echo "Erreur lors de l'ajout de l'contact.";
                }
            }
        } catch (Exception $e){
            die("Erreur : " . $e->getMessage());
        }
    }
}


$contactDAO = new ContactDAO(new Connexion());
$licencieDAO = new LicencieDAO(new Connexion());
$controller = new AddContactController($contactDAO, $licencieDAO);

if(!isset($_POST['action'])){
    $controller->index();
} else{
    $controller->ajoutContact();
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/models/Licencie.php");
require_once("../../classes/dao/ContactDAO.php");
require_once("../../classes/dao/LicencieDAO.php");

?>