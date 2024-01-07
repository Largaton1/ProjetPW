<?php
require_once("../../classes/models/Categorie.php");
require_once("../../classes/models/Licencie.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/CategorieDAO.php");
require_once("../../classes/dao/LicencieDAO.php");
require_once("../../classes/dao/ContactDAO.php");
class LicencieDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function create(Licencie $licencie) {
        $contactDAO = new ContactDAO($this->connexion);
        $categorieDAO = new CategorieDAO($this->connexion);
        $query = "INSERT INTO licencies (numero_licencie, nom, prenom, contact_id,categorie_id) VALUES (:numero_licencie, :nom, :prenom, :contact_id, :categorie_id)";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':numero_licencie', $licencie->getNumeroLicencie());
        $stmt->bindValue(':nom', $licencie->getNom());
        $stmt->bindValue(':prenom', $licencie->getPrenom());
        $stmt->bindValue(':contact_id',$licencie->getContact());
        $stmt->bindValue(':categorie_id',$licencie->getCategorie());
        $stmt->execute();
        return $this->connexion->pdo->lastInsertId();
    }

    public function getById($id){
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencies WHERE licencie_id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
            if ($row) {
                $contactDAO = new ContactDAO($this->connexion);
                $categorieDAO = new CategorieDAO($this->connexion);
 
                $contact = $contactDAO->getById($row['contact_id']);
                $categorie = $categorieDAO->getById($row['categorie_id']);
 
                $licencie = new Licencie($row['licencie_id'],$row['numero_licencie'], $row['nom'], $row['prenom'], $contact,$categorie);
                return $licencie;
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    public function getAll(){
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencies");
            $licencies = [];
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contactDAO = new ContactDAO($this->connexion);
                $categorieDAO = new CategorieDAO($this->connexion);
                $contact = $contactDAO->getById($row['contact_id']);
                $categorie = $categorieDAO->getById($row['categorie_id']);
                $licencie = new Licencie($row['licencie_id'],$row['numero_licencie'], $row['nom'], $row['prenom'], $contact,$categorie);
                $licencies[] = $licencie;
                
            }
            return $licencies;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }


    public function update(Licencie $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE licencies SET numero_licencie=?, nom=?, prenom=?, contact_id=?, categorie_id=? WHERE licencieid=?");
            $stmt->execute([$licencie->getNumeroLicencie(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getContact()->getId(), $licencie->getCategorie(), $licencie->getIdLicencie()]);
            return true;
        } catch (PDOException $e) {
            // Handle the error
            return false;
        }
    }
    

   
    
    public function delete($id) {
        try {
            $query = "DELETE FROM licencies WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
 
        return $stmt->rowCount();
        } catch (PDOException $e) {
            // Gérer l'erreur
            return false;
        }
    }
    
}