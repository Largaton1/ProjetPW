<?php
class LicencieDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(LicencieModel $licencie)
    {
        try {
            $query = "INSERT INTO licencies (numero_licence, nom, prenom, contact_id, categorie_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$licencie->getNumeroLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getContactId(), $licencie->getCategorieId()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $query = "SELECT * FROM licencies WHERE licencie_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['numero_licence'], $row['nom'], $row['prenom'], $row['contact_id'], $row['categorie_id']);
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
            $query = "SELECT * FROM Licencies";
            $stmt = $this->pdo->query($query);
            $licencies = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencies[] = new LicencieModel($row['numero_licence'], $row['nom'], $row['prenom'], $row['contact_id'], $row['categorie_id']);
            }

            return $licencies;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update(LicencieModel $licencie)
    {
        try {
            $query = "UPDATE Licencies SET numero_licence = ?, nom = ?, prenom = ?, contact_id = ?, categorie_id = ? WHERE licencie_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$licencie->getNumeroLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getContactId(), $licencie->getCategorieId(), $licencie->getId()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM Licencies WHERE licencie_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>