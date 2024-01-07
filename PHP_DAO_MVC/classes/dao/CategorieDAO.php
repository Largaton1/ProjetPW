<?php
class CategorieDAO
{
    private $connexion;

    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM categories";
            $stmt = $this->connexion->pdo->query($sql);
            $categories = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = new Categorie($row['categorie_id'], $row['nom'], $row['code_raccourci']);
            }
            return $categories;
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération ici
            return [];
        }
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM categories WHERE categorie_id = :id";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch();
            return new Categorie($row['categorie_id'], $row['nom'], $row['code_raccourci']);
        } else {
            return null;
        }
    }

    public function create(Categorie $categorie)
    {
        $sql = "INSERT INTO categories (nom, code_raccourci) VALUES (:nom, :code)";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindValue(':nom', $categorie->getNom());
        $stmt->bindValue(':code', $categorie->getCodeRaccourci());
        $stmt->execute();

        return $this->connexion->pdo->lastInsertId();
    }

    public function update(Categorie $categorie)
    {
        $sql = "UPDATE categories SET nom = :nom, code_raccourci = :code_raccourci WHERE id = :id";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindParam(':id', $categorie->getIdCategorie());
        $stmt->bindParam(':nom', $categorie->getNom());
        $stmt->bindParam(':code_raccourci', $categorie->getCodeRaccourci());
        $stmt->execute();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM categories WHERE categorie_id = :id";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}