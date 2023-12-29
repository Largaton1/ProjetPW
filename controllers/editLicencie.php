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
require '../classes/dao/LicencieDAO.php';
require '../classes/dao/ContactDAO.php';
require '../classes/dao/CategorieDAO.php';
require '../classes/models/CategorieModel.php';
require '../classes/models/ContactModel.php';
require '../classes/models/LicencieModel.php';
require '../config/config.php';

// $userDAO = new UserDAO($pdo);
// $errorMessage = ""; // Initialisation de la variable d'erreur
// $log = $_SESSION['username'];
// $user = $userDAO->getUserByUsername($log);
// require_once '../modele/ajoutpersonneDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$nom =htmlspecialchars($_POST['nom']); // htmlspecialchars permet de prevenir des attaques XSS (vu sur Google)
$prenom=htmlspecialchars($_POST['prenom']);
$num_licence=htmlspecialchars($_POST['num_licence']);
$id_contactl=htmlspecialchars($_POST['id_contact']);
$id_categorie=htmlspecialchars($_POST['id_categorie']);
$id=htmlspecialchars($_POST['id']);


$ajoutlicencieDAO = new LicencieModel($num_licence,$nom, $prenom, $id_contactl, $id_categorie);

$licencieDAO = new LicencieDAO($pdo);

$contactDAO = new ContactDAO($pdo);

$categorieDAO = new CategorieDAO($pdo);
$categorieExiste = $categorieDAO -> getById($id_categorie);

if ($categorieExiste == null && $id_categorie != null) {

    echo "cette categorie n'existe pas";
} else { 
  $licencieDAO = new LicencieDAO($pdo);

    $licencierexiste = $licencieDAO->getByNum($num_licence);

    if ($licencierexiste != null && $num_licence !=null){ 

        echo "numeros de licencie deja attribue"; 
    } else { 

      $contactDAO = new ContactDAO($pdo);

      $contactexiste = $contactDAO->getById($id_contactl);

      if ($contactexiste == null && $id_contactl != null){
        echo "ce contacte n'existe pas". $id_contactl . "" . $contactexiste ;
      }else { 
// Appeler la méthode create pour ajouter la catégorie dans la base de données
$success = $licencieDAO->update($ajoutlicencieDAO, $id);

if ($success) {
    echo "Insertion réussie avec un ID aléatoire.";
} else {
    echo "Échec de l'insertion dans la base de données.";
    // Ajouter d'autres détails sur l'erreur si nécessaire
}
}
}
}
}
?>
</body>
</html>