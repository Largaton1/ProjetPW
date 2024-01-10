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
        $query = "UPDATE contacts SET nom_contact = :nom_contact, prenom_contact = :prenom_contact, email = :email, telephone = :telephone WHERE contact_id = :contact_id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':contact_id', $contact->getId());
        $stmt->bindValue(':nom_contact', $contact->getNomContact());
        $stmt->bindValue(':prenom_contact', $contact->getPrenom());
        $stmt->bindValue(':email', $contact->getEmail());
        $stmt->bindValue(':telephone', $contact->getTelephone());
        $stmt->execute();
 
        return $stmt->rowCount();
    }
 
    public function delete( $id)
    {
        $query = "DELETE FROM contacts WHERE contact_id = :contact_id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':contact_id', $id);
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

  
}