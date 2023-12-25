<?php
class ContactDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(ContactModel $contact)
    {
        try {
            $query = "INSERT INTO contacts (nom, prenom,email,tel) VALUES (?,?,?,?)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$contact->getEmail(), $contact->getprenom(), $contact->getNom(), $contact->getTelephone()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $query = "SELECT * FROM Contact WHERE contact_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new ContactModel( $row['nom'], $row['prenom'], $row['email'],$row['tel']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function getAll()
    {
        try {
            $query = "SELECT * FROM Contact";
            $stmt = $this->pdo->query($query);
            $contact = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contact[] = new ContactModel($row['email'], $row['nom'], $row['prenom'], $row['tel']);
            }

            return $contact;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update(contactModel $contact,$id)
    {
        try {
            if ($contact->getNom() !=""){
                $query = "UPDATE contacts SET nom = ? WHERE contact_id = $id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$contact->getNom()]);
                }
            if ($contact->getPrenom() !=""){
                $query = "UPDATE contacts SET prenom = ? WHERE contact_id = $id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$contact->getPrenom()]);
                } 
            if ($contact->getEmail() !=""){
                $query = "UPDATE contacts SET email = ? WHERE contact_id = $id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$contact->getEmail()]);
                }
            if ($contact->getTelephone() !=""){
                $query = "UPDATE contacts SET tel = ? WHERE contact_id = $id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$contact->getTelephone()]);
                }            
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id)
    {
        try {
            $query  = "DELETE FROM contacts WHERE contact_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>