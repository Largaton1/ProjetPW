<!DOCTYPE html>
<html>
<head>
  <title>Supprimer une categorie</title>
  <link href="../css/v2.css" rel="stylesheet">
</head>

<body>

<?php
session_start();
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