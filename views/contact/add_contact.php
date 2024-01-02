<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">

</head>

<!DOCTYPE html>
<html>
<head>
<title>Ajout de catégorie</title>
</head>

<body>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "projetpw";

// Vérifier si la session est active
if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location: ../../views/login.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

require_once '../../classes/dao/EducateurDAO.php';
require '../../config/connexion.php';

$conn = new Connexion();
$educateurDAO = new EducateurDAO($conn);

$login=$_SESSION['username'];

if ($educateurDAO->isAdmin($login)==true) {
   
?>
<body>
<h1>Ajouter un contact</h1>
<a href="IndexContactController.php">Retour à la liste des contacts</a>

    <form action="AddContactController.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="nom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email"><br>
        <label for="telephone">Telephone :</label>
        <input type="telephone" id="telephone" name="telephone"><br>
        <input type="submit" name="action" value="Ajouter">
    </form>
</body>
</html>
<?php
} else {
  echo "Action reserver au admin";
}
?>