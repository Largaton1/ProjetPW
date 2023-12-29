<!DOCTYPE html>
<html>
<head>
<title>Ajout de personne</title>
<link href="../css/v2.css" rel="stylesheet">
</head>

<body>

<?php
session_start();



// Le reste du code pour la page 2
?>

<a href="../view/acceuil.php">Accueil</a>


<form action="../../controllers/AjoutEducateur.php" method="post">
  <table>

  <tr>
  <td> Id de licencié </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="id"> </td>
  </tr>

  <tr>
  <td> mail </td>
  <td> <input  type='mail' id='keyw' placeholder='Tapez ici' name="email"> </td>
  </tr>

  <tr>
  <td> mot de passe </td>
  <td> <input  type='password' id='keyw' placeholder='Tapez ici' name="password"> </td>
  </tr>
  

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>