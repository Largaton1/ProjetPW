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
            $query = "INSERT INTO Educateurs (id,nom, prenom,mail,telephone) VALUES (:id,:nom, :prenom,:mail,:telephone)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$contact->getId(),$contact->getMail(), $contact->getprenom(), $contact->getNom(), $contact->getTelephone()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $query = "SELECT * FROM Contact WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new ContactModel($row['id'],$row['mail'], $row['nom'], $row['prenom'], $row['telephone']);
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
                $contact[] = new ContactModel($row['id'],$row['mail'], $row['nom'], $row['prenom'], $row['telephone']);
            }

            return $contact;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update(contactModel $contact)
    {
        try {
            $query = "UPDATE Licencies SET numero_licence = ?, nom = ?, prenom = ?, contact_id = ?, categorie_id = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$contact->getId(),$contact->getMail(), $contact->getprenom(), $contact->getNom(), $contact->getTelephone()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM Contact WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>