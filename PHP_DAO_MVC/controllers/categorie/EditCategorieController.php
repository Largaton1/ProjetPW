<?php
class EditCategorieController {
    private $categorieDAO;
    public $categorie_id;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function update($id) {
        // Récupérer li categorie à modifier en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom_categorie = $_POST['nom_categorie'];
            $code_raccourci = $_POST['code_raccourci'];

            // Mettre à jour les détails di categorie
            $categorie->setNom($nom_categorie);
            $categorie->setCodeRaccourci($code_raccourci);
            
            $resultatMiseAJour = $this->categorieDAO->update($categorie);
            echo "Résultat de la mise à jour : ";
         
            //Appeler la méthode du modèle(categorieDAO) pour mettre à jour li categorie
            if ($resultatMiseAJour) {
                
                // Rediriger vers la page de détails di categorie après la modification
                echo"Catégorie modifiée avec succès";
               
                header('Location: ../categorie/IndexCategorieController.php');
                exit();
                
            } else {
                // Gérer les erreurs de mise à jour di categorie
                echo "Erreur lors de la modification de la catégorie.";
                header('Location: ../categorie/IndexCategorieController.php');
                exit();
            }
        }

        // Inclure la vue pour afficher le formulaire de modification di categorie
        include('../../views/categories/edit_categorie.php');
    }
    
}
require_once( "../../classes/dao/CategorieDAO.php");
require_once( "../../classes/models/Categorie.php");
require_once( "../../config/config.php");
require_once( "../../config/connexion.php");
$categorieDAO=new CategorieDAO(new Connexion());
$controller=new EditCategorieController($categorieDAO);
$controller->update($_GET['Id']);
$categorie_id = isset($_GET['categorie_id']) ? $_GET['categorie_id'] : null;

if ($categorie_id === null) {
    echo "L'ID n'est pas défini dans l'URL.";
    return;
}
?>