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
require '../classes/dao/LicencieDAO.php';
require '../classes/models/LicencieModel.php';
require '../config/config.php';

// $userDAO = new UserDAO($pdo);
// $errorMessage = ""; // Initialisation de la variable d'erreur
// $log = $_SESSION['username'];
// $user = $userDAO->getUserByUsername($log);
// require_once '../modele/ajoutpersonneDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$id =htmlspecialchars($_POST['id']); // htmlspecialchars permet de prevenir des attaques XSS (vu sur Google)

$licencieDAO = new LicencieDAO($pdo);



// Appeler la méthode create pour ajouter la catégorie dans la base de données
$success = $licencieDAO->deleteById($id);

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