<!DOCTYPE html>
<html>
<head>
<title>Ajout de catégorie</title>
</head>

<body>

<?php
session_start();



// Le reste du code pour la page 2
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