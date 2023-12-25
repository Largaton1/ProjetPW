<?php
class AddCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        //include('views/ajout_categorie.php'); 
    }
    
    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          
            $nom = $_POST['nom'];
            $code = $_POST['code'];

            $nouvelleCategorie = new CategorieModel($nom, $code,);
            if ($this->categorieDAO->create($nouvelleCategorie)) {
                header('Location:index.php?page=home');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la categorie.";
            }
        }

        //include('views/ajout_categorie.php');
    }
}
?>