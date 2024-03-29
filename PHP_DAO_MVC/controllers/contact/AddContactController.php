<?php
class AddContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index() {
    // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/contact/add_contact.php'); 
    }
    
    public function addContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom_contact'];
            $prenom = $_POST['prenom_contact'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet Contact avec les données du formulaire
            $nouveauContact = new Contact(0, $nom, $prenom, $email, $telephone);

            // Appeler la méthode du modèle (ContactDAO) pour ajouter le contact
            if ($this->contactDAO->create($nouveauContact)) {
                // Rediriger vers la page d'accueil après l'ajout
               echo"contact ajouté";
               header('Location: ../../controllers/contact/IndexContactController.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
                header('Location: ../../controllers/contact/IndexContactController.php');
                exit();
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/contact/add_contact.php');
    }
}


require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new AddContactController($contactDAO);
if(!isset($_POST['action'])){
$controller->index();
}else{
$controller->addContact();
}


?>