
<!DOCTYPE html>
<html>
<head>
<title>modification de contact</title>
<link href="../css/v2.css" rel="stylesheet">
</head>

<body>

<?php
session_start();



// Le reste du code pour la page 2
?>

<a href="../view/acceuil.php">Accueil</a>


<form action="../../controllers/editContact.php" method="post">
  <table name="">

  <tr>
  <td> Id du contact a modifier</td>
  <td> <input  type='number' id='keyw' placeholder='Tapez ici' name="id"> </td>
  </tr>
 
  <tr>
  <td> Nom </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="nom"> </td>
  </tr>

  <tr>
  <td> prenom </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="prenom"> </td>
  </tr>

  <tr>
  <td> email </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="email"> </td>
  </tr>

  <tr>
  <td> tel </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="tel"> </td>
  </tr>
  

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>