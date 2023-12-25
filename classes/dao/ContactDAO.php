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
                return new ContactModel($row['email'], $row['nom'], $row['prenom'], $row['tel']);
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

    public function update(contactModel $contact)
    {
        try {
            $query = "UPDATE Licencies SET numero_licence = ?, nom = ?, prenom = ?, contact_id = ?, categorie_id = ? WHERE contact_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$contact->getId(),$contact->getEmail(), $contact->getprenom(), $contact->getNom(), $contact->getTelephone()]);
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