
<!DOCTYPE html>
<html>
<head>
<title>modification de educateur</title>
<link href="../css/v2.css" rel="stylesheet">
</head>

<body>

<?php
session_start();



// Le reste du code pour la page 2
?>

<a href="../view/acceuil.php">Accueil</a>


<form action="../../controllers/editEducateur.php" method="post">
  <table name="">

  <tr>
  <td> Id du educateur a modifier</td>
  <td> <input  type='number' id='keyw' placeholder='Tapez ici' name="id"> </td>
  </tr>
 
  
  <tr>
  <td> Id de Licence </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="licencie_id"> </td>
  </tr>

  <tr>
  <td> email </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="email"> </td>
  </tr>

  <tr>
  <td> password </td>
  <td> <input  type='password' id='keyw' placeholder='Tapez ici' name="password"> </td>
  </tr>

  <tr>
  <td> Admin ? </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="est_administrateur"> </td>
  </tr>

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>