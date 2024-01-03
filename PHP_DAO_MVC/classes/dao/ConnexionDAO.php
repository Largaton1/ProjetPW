<?php
class ConnexionDAO {
    private $connexion;

    public function __construct($servername, $username, $password, $database) {
        try {
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            );
            $this->connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password, $options);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

public function verifierConnexion($email, $password) {
        try {
            $sql = "SELECT COUNT(*) FROM educateurs WHERE email = :email AND password = :password";
            $requete = $this->connexion->prepare($sql);
            $requete->bindParam(':email', $email);
            $requete->bindParam(':password', $password);
            $requete->execute();
            $resultat = $requete->fetchColumn();

            return $resultat > 0;
        } catch(PDOException $e) {
            echo "Erreur lors de la vérification de la connexion : " . $e->getMessage();
            return false;
        }
    }
}
?>