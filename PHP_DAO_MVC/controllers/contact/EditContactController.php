<?php
class EditContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index($id){
        $contact = $this->contactDAO->getById($id);
        include('../../views/contact/edit_contact.php');
    }

    public function editContact($id) {
        try {
           
            $contact = $this->contactDAO->getById($id);

            if (!$contact) {
                echo "The contact was not found.";
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $telephone = $_POST['$telephone'];

                $contact->setNom($nom);
                $contact->setPrenom($prenom);
                $contact->setEmail($email);
                $contact->setTelephone($telephone);

                if ($this->contactDAO->update($contact)) {
                    
                    header('Location:IndexContactController.php');
                    exit();
                } else {
                  
                    echo "Erreur de mise a jour";
                }
            }
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }
}



$contactDAO = new ContactDAO(new Connexion());
$controller = new EditContactController($contactDAO);
if(!isset($_POST['action'])){
    $controller->index($_GET["id"]);
} else{
    $id = $_POST['id'];
    $controller->editContact($id);
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/ContactDAO.php");

?>