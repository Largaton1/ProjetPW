<?php
class DeleteCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function delete($id) {
        // Récupérer la categorie à supprimer en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        if (!$categorie) {
            // La catégorie n'a pas été trouvée, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le catégorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer la catégorie en appelant la méthode du modèle (CategorieDAO)
            if ($this->categorieDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                echo"catégorie supprimée";
                header('Location:../../IndexCategorieController.php');
                exit();
                
            } 
           
            else {
                // Gérer les erreurs de suppression du contact
                echo "Erreur lors de la suppression du contact.";
                header('Location: ../categorie/IndexCategorieController.php');
                exit();
            }
            
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('../../views/categories/delete_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Categorie.php");

require_once("../../classes/dao/CategorieDAO.php");
require_once("../../controllers/categorie/DeleteCategorieController.php");


$categorieDAO=new CategorieDAO(new Connexion());
$controller=new DeleteCategorieController($categorieDAO);
$id = $_GET['Id'];
$controller->delete($id);
if ($id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}
?>