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
require '../classes/dao/CategorieDAO.php';
require '../classes/models/CategorieModel.php';
require '../config/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$nom =htmlspecialchars($_POST['nom']); // htmlspecialchars permet de prevenir des attaques XSS (vu sur Google)
$code_raccourci=htmlspecialchars($_POST['code_raccourci']);


$ajoutcategorieDAO = new CategorieModel($nom, $code_raccourci);

$categorieDAO = new CategorieDAO($pdo);

$verifCode = $categorieDAO->getByCode($code_raccourci);
// Appeler la méthode create pour ajouter la catégorie dans la base de données

if ($verifCode==null){
  $success = $categorieDAO->create($ajoutcategorieDAO);

if ($success) {
    echo "Insertion réussie ";
} else {
    echo "Échec de l'insertion dans la base de données.";
    // Ajouter d'autres détails sur l'erreur si nécessaire
}

} else {
  echo "Code existant";
}


}
?>
</body>
</html>