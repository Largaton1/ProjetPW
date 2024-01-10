<?php
class IndexCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        // Récupérer la liste de toutes les catégories depuis le modèle
        $categories = $this->categorieDAO->getAll();

        // Inclure la vue pour afficher la liste des catégories
        include('../../views/categories/index_categorie.php');
    }
}

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Categorie.php");
require_once("../../classes/dao/CategorieDAO.php");
$categorieDAO = new CategorieDAO(new Connexion());
$controller = new IndexCategorieController($categorieDAO);
$controller->index();
?>