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
        $query = "INSERT INTO contacts (nom_contact, prenom_contact, email, telephone) VALUES (:nom, :prenom, :email, :telephone)";
        $stmt = $this->connexion->pdo->prepare($query);
 
        $stmt->bindValue(':nom', $contact->getNomContact());
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
                $contacts[] = new Contact($row['contact_id'],$row['nom_contact'], $row['prenom_contact'], $row['email'], $row['telephone']);
            }
            return $contacts;
        } catch (PDOException $e) {

            return [];
        }
    }
 
 
    public function update(Contact $contact)
    {
        $query = "UPDATE contacts SET nom_contact = :nom, prenom_contact = :prenom, email = :email, telephone = :telephone WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $contact->getId());
        $stmt->bindValue(':nom', $contact->getNomContact());
        $stmt->bindValue(':prenom', $contact->getPrenom());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':telephone', $contact->getTelephone());
        $stmt->execute();
 
        return $stmt->rowCount();
    }
 
    public function delete( $id)
    {
        $query = "DELETE FROM contacts WHERE contact_id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
 
        return $stmt->rowCount();
    }
    
    public function getById($id){
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM contacts WHERE contact_id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
            if ($row) {
                return new Contact($row['contact_id'],$row['nom_contact'], $row['prenom_contact'], $row['email'], $row['telephone']);
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    public function getByCriteria($nom, $prenom, $email, $telephone) {
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