<!DOCTYPE html>
<html>
<head>
  <title>Supprimer une categorie</title>
  <link href="../css/v2.css" rel="stylesheet">
</head>

<body>

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

<form action="../../controllers/suppcategorie.php" method="post">
  <table>
  <tr>
  <td>Id de la categorie a supprimer</td>
  <td> <input  type='number' id='keyw' placeholder='Tapez ici' name="id"> </td>
  </tr>
    <tr>
      <td><input type="submit" name="supp" value="Supprimer"></td>
    </tr>
  </table>
</form>

<a href="../view/acceuil.php">Accueil</a> 

</body>
</html>
<?php
} else {
  echo "Action reserver au admin";
}
?>