<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require '../classes/dao/LicencieDAO.php';
require '../classes/dao/ContactDAO.php';
require '../classes/models/ContactModel.php';
require '../classes/models/LicencieModel.php';
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try{

    $nom_contact = htmlspecialchars($_POST['nom']);
    $prenom_contact = htmlspecialchars($_POST['prenom']);
    $mail_contact = htmlspecialchars($_POST['email']);
    $tel_contact = htmlspecialchars($_POST['tel']);
    $id = htmlspecialchars($_POST['id']);

    $contactDAO = new ContactDAO($pdo);
    $ajoutcontactDAO = new ContactModel($nom_contact, $prenom_contact, $mail_contact, $tel_contact);
    $successContact = $contactDAO->create($ajoutcontactDAO);

    if ($successContact) {
        $id_contact = $ajoutcontactDAO->getId();

        $num_licence = "";
        $nom = "";
        $prenom = "";
        $id_categorie = "";

        $licencieDAO = new LicencieDAO($pdo);
        $licencieToUpdate  = new LicencieModel($num_licence,$nom, $prenom, $id_contact, $id_categorie);

        $licencie = $licencieDAO ->getById($id);

        $id_contactbis = $licencieToUpdate->getid();

        if ($licencie == null) {
            echo "pas de licencie";
        } else {
            echo $id_contactbis ;
        }
        $successLicencie = $licencieDAO->update($licencieToUpdate, $id);
 
        if ($successLicencie) {
            echo "yay";
        } else {
            echo "Échec de la mise à jour du licencié dans la base de données.";
        }
    } else {
        echo "Échec de l'insertion du contact dans la base de données.";
    }
} catch (PDOException $e) {
    echo "Erreur SQL : " . $e->getMessage();
}
}
?>
