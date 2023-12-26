<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
</head>
<body>

<?php
require '../../classes/dao/licencieDAO.php';
require '../../classes/models/LicencieModel.php'; // Assurez-vous de spécifier le bon chemin d'accès

// Créez une instance de PDO et de CategorieDAO (remplacez ces informations par vos propres informations de connexion)
$pdo = new PDO("mysql:host=localhost;dbname=projetpw;charset=utf8", "root", "");

$licencieDAO = new LicencieDAO($pdo);

// Utilisez la fonction getAll pour récupérer toutes les catégories
$licencies = $licencieDAO->getAll();

//Vérifiez si des catégories ont été récupérées
if (!empty($licencies)) {
    // Affichez les catégories
    echo '<h1>Liste des licencies</h1>';
    echo '<ul>';
    foreach ($licencies as $licencie) {
        echo '<li>' . htmlspecialchars($licencie->getNom()) . ' - ' . htmlspecialchars($licencie->getPrenom()) . ' - ' . htmlspecialchars($licencie->getNumeroLicence()) . ' - ' . htmlspecialchars($licencie->getContactId()) .' - ' . htmlspecialchars($licencie->getCategorieId()).'</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Aucun contactes trouvée.</p>';
}
?>

</body>
</html>
