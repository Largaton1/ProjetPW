<?php
 
 
class Connexion{
 
 
   public $pdo;
    public function __construct(){
   
    global $host;
    global $database;
    global $username;
    global $password;
    // Connexion à la base de données en utilisant PDO
    try {
    $this->pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Définir le mode d'erreur PDO à exception
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message d'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
    // Pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Début du code

session_start();
$errorMessage = ""; // Initialisation de la variable d'erreur

require_once '../classes/dao/ConnexionDAO.php';
require '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire en utilisant htmlspecialchars pour éviter les failles XSS
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $_SESSION['username'] = $email;

    $servername = "localhost";
    $username = "root";
    $passwordi = "";
    $database = "projetpw";

    $ConnexionDAO = new ConnexionDAO($servername, $username, $passwordi, $database);
    // Connexion à la base de données
 
    if ($ConnexionDAO->verifierConnexion($email, $password)) {
        // Connexion réussie, rediriger vers une autre page
        echo "Connexion réussie";
        // header('Location: acceuil.php');
        
    } else {
        // Identifiants incorrects, afficher un message d'erreur
        $_SESSION['message'] = "Identifiants et/ou mot de passe incorrects";
        echo "rate ";
        echo "Email: $email,  ";
        echo $_POST['password'];
        echo $password;
        // echo $password;

        // header('Location: ../view/login.php');
    }
    }

    
 
}}
?>
 