<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
</head>
<body>

<?php
require '../../classes/dao/EducateurDAO.php';
require '../../classes/models/EducateurModel.php'; // Assurez-vous de spécifier le bon chemin d'accès

// Créez une instance de PDO et de CategorieDAO (remplacez ces informations par vos propres informations de connexion)
$pdo = new PDO("mysql:host=localhost;dbname=projetpw;charset=utf8", "root", "");

$EducateurDAO = new EducateurDAO($pdo);

// Utilisez la fonction getAll pour récupérer toutes les catégories
$educateurs = $EducateurDAO->getAll();

//Vérifiez si des catégories ont été récupérées
if (!empty($educateurs)) {
    // Affichez les catégories
    echo '<h1>Liste des Educateurs</h1>';
    echo '<ul>';
    foreach ($educateurs as $educateur) {
        echo '<li>' . htmlspecialchars($educateur->getLicenceID()) . ' - ' . htmlspecialchars($educateur->getEmail()) . ' - ' . htmlspecialchars($educateur->getAdmin()) .'</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Aucun educateurs trouvée.</p>';
}
?>

</body>
</html>
