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
                echo "The contact n'est pas trouvé.";
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               
                $nom = $_POST['nom_contact'];
                $prenom = $_POST['prenom_contact'];
                $email = $_POST['email'];
                $telephone = $_POST['telephone'];

                $contact->setNom($nom);
                $contact->setPrenom($prenom);
                $contact->setEmail($email);
                $contact->setTelephone($telephone);

                if ($this->contactDAO->update($contact)) {
                    
                    header('Location:../contact/IndexContactController.php');
                    exit();
                } else {
                  
                    echo "Erreur de mise a jour";
                    header('Location: ../contact/IndexContactController.php');
                exit();
                }
            }
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/ContactDAO.php");
$contactDAO = new ContactDAO(new Connexion());
$controller = new EditContactController($contactDAO);
if(!isset($_POST['action'])){
    $controller->index($_GET["Id"]);
} else{
    $id = $_POST['contact_id'];
    $controller->editContact($id);
}



?>