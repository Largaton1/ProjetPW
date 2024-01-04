<?php

class Connexion {
    private $pdo;

    public function __construct($host, $database, $username, $password) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Authentification
    public function controle_admin($email, $password) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM educateur WHERE email = :email AND password = :password");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si des résultats sont retournés
            if ($result) {
                return true; // Authentification réussie
            } else {
                return false; // Authentification échouée
            }
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
}


?>
