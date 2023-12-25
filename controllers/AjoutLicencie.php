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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$nom =htmlspecialchars($_POST['nom']); // htmlspecialchars permet de prevenir des attaques XSS (vu sur Google)
$prenom=htmlspecialchars($_POST['prenom']);
$numero_de_licencie=htmlspecialchars($_POST['numero_de_licencie']);
$prenom_contact=htmlspecialchars($_POST['prenom_contact']);
$nom_contact=htmlspecialchars($_POST['nom_contact']);
$mail_contact=htmlspecialchars($_POST['mail_contact']);
$tel_contact=htmlspecialchars($_POST['tel_contact']);
$id_cat=htmlspecialchars($_POST['id_cat']);




$categorieDAO = new categorieDAO($pdo);

$categorieModel = $categorieDAO->getById($id_cat);

$categorieId = $categorieModel->getId();

$ajoutcontactDAO = new ContactModel($nom_contact, $prenom_contact,$mail_contact,$tel_contact);

// $ajoutlicencieDAO = new LicencieModel($numero_de_licencie,$nom,$prenom,);

$contactDAO = new ContactDAO($pdo);
// Appeler la méthode create pour ajouter la catégorie dans la base de données
$successContact = $contactDAO->create($ajoutcontactDAO);

if ($successContact) {
    // Récupérer l'ID du contact fraîchement créé
    $contactId = $ajoutcontactDAO->getId();

    // Créer une instance de LicencieModel avec les données du formulaire et l'ID du contact
    $ajoutlicencieDAO = new LicencieModel($numero_de_licencie, $nom, $prenom, $contactId,$categorieId);

    // Créer une instance de LicencieDAO avec l'instance de PDO déjà configurée
    $licencieDAO = new LicencieDAO($pdo);

    // Appeler la méthode create pour ajouter le licencié dans la base de données
    $successLicencie = $licencieDAO->create($ajoutlicencieDAO);

    if ($successLicencie) {
        echo "Insertion réussie avec un ID aléatoire.";
    } else {
        echo "Échec de l'insertion du licencié dans la base de données.";
        // Ajouter d'autres détails sur l'erreur si nécessaire
    }
} else {
    echo "Échec de l'insertion du contact dans la base de données.";
    // Ajouter d'autres détails sur l'erreur si nécessaire
}


}
?>
</body>
</html>