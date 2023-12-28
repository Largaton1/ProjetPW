<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
</head>
<body>

<?php
require '../../classes/dao/CategorieDAO.php';
require '../../classes/models/CategorieModel.php'; // Assurez-vous de spécifier le bon chemin d'accès

// Créez une instance de PDO et de CategorieDAO (remplacez ces informations par vos propres informations de connexion)
$pdo = new PDO("mysql:host=localhost;dbname=projetpw;charset=utf8", "root", "");

$categorieDAO = new CategorieDAO($pdo);

// Utilisez la fonction getAll pour récupérer toutes les catégories
$categories = $categorieDAO->getAll();

//Vérifiez si des catégories ont été récupérées
if (!empty($categories)) {
    // Affichez les catégories
    echo '<h1>Liste des Catégories</h1>';
    echo '<ul>';
    foreach ($categories as $categorie) {
        echo '<li>' . htmlspecialchars($categorie->getId()) . htmlspecialchars($categorie->getNom()) . ' - ' . htmlspecialchars($categorie->getCode()) . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Aucune catégorie trouvée.</p>';
}
?>

</body>
</html>
