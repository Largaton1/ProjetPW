<!DOCTYPE html>
<html>
<head>
    <title>Configuration du modèle</title>
</head>

<body>
<?php

// Paramètres de connexion à la base de données
$host = 'localhost'; // Hôte de la base de données
$db = 'projetpw'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);

    // Configuration supplémentaire pour les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion à la base de données réussie.";
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit(); // Arrête le script en cas d'échec de la connexion
}

// Vous pouvez maintenant inclure cette page de configuration dans d'autres pages
// pour utiliser l'objet PDO déjà configuré.

?>
</body>
</html>
