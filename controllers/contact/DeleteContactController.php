<?php
class DeleteContactController
{
    private $contactDAO;
    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function deleteContact($contactId) {
    
        $contact = $this->contactDAO->getById($contactId);

        if (!$contact) {
           
            echo "The contact was not found.";
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($this->contactDAO->deleteById($contactId)) {
                header('Location:IndexContactController.php');
                exit();
            } else {
             
                echo "Error lors de la suppresion";
            }
        }
    }
}
require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/ContactDAO.php");
$contactDAO = new ContactDAO(new Connexion());
$controller = new DeleteContactController($contactDAO);
$controller->deleteContact($_GET['id']);
?>