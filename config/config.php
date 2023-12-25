<!DOCTYPE html>
<html>
<head>
  <title> config modele </title>
</head>

<body>
<?php

$host = 'localhost'; // Hôte de la base de données
$db = 'projetpw'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL

echo "bonne page";
//connexion a la base de donnée
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}
?>
</body>
</html>