<!DOCTYPE html>
<html>
<head>
  <title> Supp de categorie controlleur </title>
</head>


<body>

<?php

// Pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Debut du code

session_start();
require '../classes/dao/CategorieDAO.php';
require '../classes/dao/LicencieDAO.php';
require '../classes/models/CategorieModel.php';
require '../classes/models/LicencieModel.php';
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$id =htmlspecialchars($_POST['id']); // htmlspecialchars permet de prevenir des attaques XSS (vu sur Google)

$categorieDAO = new CategorieDAO($pdo);



// Appeler la méthode create pour ajouter la catégorie dans la base de données
$success = $categorieDAO->deleteById($id);

if ($success) {
    echo "suppression réussie .";
} else {
    echo "Échec de la suppression dans la base de données.";
    // Ajouter d'autres détails sur l'erreur si nécessaire
}


}
?>
</body>
</html>