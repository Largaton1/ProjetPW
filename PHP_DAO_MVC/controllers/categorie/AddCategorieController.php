<?php
class AddCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
    // Inclure la vue pour afficher le formulaire d'ajout de categorie
        include('../../views/categories/add_categorie.php'); 
    }
    
    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom_categorie'];
            $code = $_POST['code_raccourci'];
            // var_dump($nom);
            // var_dump($code);
            // die();
            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouvelleCategorie = new Categorie(0, $nom, $code);
           
            
            // Appeler la méthode du modèle (CategorieDAO) pour ajouter le contact
            if ($this->categorieDAO->create($nouvelleCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
               echo"categorie ajouté";
               header('Location: ../categorie/IndexCategorieController.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
                header('Location: ../categorie/IndexCategorieController.php');
                exit();
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('../../views/categorie/create_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");  // Utiliser include_once ici
require_once("../../classes/models/Categorie.php");
require_once("../../classes/dao/CategorieDAO.php");
$categorieDAO = new CategorieDAO(new Connexion());
$controller = new AddCategorieController($categorieDAO);
if (!isset($_POST['action'])) {
    $controller->index();
} else {
    $controller->addCategorie();
}
?>
