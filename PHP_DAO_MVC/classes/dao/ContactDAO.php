<?php
class ContactDAO
{
    private $connexion ;
 
    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }
 
    public function create(Contact $contact)
    {
        $query = "INSERT INTO contacts (nom, prenom, email, telephone) VALUES (:nom, :prenom, :email, :telephone)";
        $stmt = $this->connexion->pdo->prepare($query);
 
        $stmt->bindValue(':nom', $contact->getNom());
        $stmt->bindValue(':prenom', $contact->getPrenom());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':telephone',$contact->getTelephone());
        $stmt->execute();
 
        return $this->connexion->pdo->lastInsertId();
    }
 
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM contacts");
            $contacts = [];
 
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = new Contact($row['contact_id'],$row['nom'], $row['prenom'], $row['email'], $row['telephone']);
            }
            return $contacts;
        } catch (PDOException $e) {

            return [];
        }
    }
 
 
    public function update(Contact $contact)
    {
        $query = "UPDATE contacts SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $contact->getId());
        $stmt->bindValue(':nom', $contact->getNom());
        $stmt->bindValue(':prenom', $contact->getPrenom());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':telephone', $contact->getTelephone());
        $stmt->execute();
 
        return $stmt->rowCount();
    }
 
    public function delete( $id)
    {
        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
 
        return $stmt->rowCount();
    }
    
    public function getById($id){
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM contacts WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
            if ($row) {
                return new Contact($row['id'],$row['nom'], $row['prenom'], $row['email'], $row['telephone']);
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    public function getByCriteria($nom, $prenom, $email, $numeroTel) {
        $query = "SELECT * FROM licencies l
                INNER JOIN contacts c ON l.contact_id = c.id
                WHERE l.nom = :nom
                AND l.prenom = :prenom
                AND c.email = :email
                AND c.telephone = :telephone";
        
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne le licencié s'il existe, sinon retourne false
    }
}