<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Catégories</title>
</head>
<body>

<?php
require '../../classes/dao/ContactDAO.php';
require '../../classes/models/ContactModel.php'; // Assurez-vous de spécifier le bon chemin d'accès

// Créez une instance de PDO et de CategorieDAO (remplacez ces informations par vos propres informations de connexion)
$pdo = new PDO("mysql:host=localhost;dbname=projetpw;charset=utf8", "root", "");

$contactDAO = new ContactDAO($pdo);

// Utilisez la fonction getAll pour récupérer toutes les catégories
$contact = $contactDAO->getAll();

//Vérifiez si des catégories ont été récupérées
if (!empty($contact)) {
    // Affichez les catégories
    echo '<h1>Liste des Contacts</h1>';
    echo '<ul>';
    foreach ($contact as $contacts) {
        echo '<li>' . htmlspecialchars($contacts->getNom()) . ' - ' . htmlspecialchars($contacts->getPrenom()) . ' - ' . htmlspecialchars($contacts->getEmail()) . ' - ' . htmlspecialchars($contacts->getTelephone()) .'</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Aucun contactes trouvée.</p>';
}
?>

</body>
</html>
