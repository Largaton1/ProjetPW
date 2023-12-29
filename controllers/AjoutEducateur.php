<!DOCTYPE html>
<html>
<head>
  <title> ajout de categorie controlleur </title>
</head>


<body>

<?php

// Pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Debut du code

session_start();
require '../classes/dao/EducateurDAO.php';
require '../classes/dao/LicencieDAO.php';
require '../classes/models/LicencieModel.php';
require '../classes/models/EducateurModel.php';
require '../config/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$email =htmlspecialchars($_POST['email']); // htmlspecialchars permet de prevenir des attaques XSS (vu sur Google)
$password=htmlspecialchars($_POST['password']);
$id=htmlspecialchars($_POST['id']);


$ajouteducateurDAO = new EducateurModel($id,$email, $password,0);

$educateurDAO = new EducateurDAO($pdo);

$licencieDAO = new LicencieDAO($pdo);

$estLicencie = $licencieDAO ->getById($id);

if ($estLicencie == null) {
 
  echo "ID de licencie non inscrit dans la base de donnée";
}  else {  
// Appeler la méthode create pour ajouter la catégorie dans la base de données
$success = $educateurDAO->create($ajouteducateurDAO);

if ($success) {
    echo "Insertion réussie avec un ID aléatoire.";
} else {
    echo "Échec de l'insertion dans la base de données.";
    // Ajouter d'autres détails sur l'erreur si nécessaire
}

}
}
?>
</body>
</html>