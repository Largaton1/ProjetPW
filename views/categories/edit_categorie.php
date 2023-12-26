<!DOCTYPE html>
<html>
<head>
<title>modification d'une categorie</title>
</head>

<body>

<?php
session_start();
?>

<a href="../view/acceuil.php">Accueil</a>


<form action="../../controllers/editCategorie.php" method="post">
  <table name="">

  <tr>
  <td> Id de la categorie a modifier</td>
  <td> <input  type='number' id='keyw' placeholder='Tapez ici' name="id"> </td>
  </tr>
 
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