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

<a href="../view/acceuil.php">Accueil</a>


<form action="../../controllers/AjoutCategorie.php" method="post">
  <table>

  <tr>
  <td> Nom </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="nom"> </td>
  </tr>

  <tr>
  <td> code_raccourcie </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="code_raccourci"> </td>
  </tr>
  

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>

<?php
} else {
  echo "Action reserver au admin";
}
?>