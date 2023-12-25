<?php

class CategorieDAO


{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function create(CategorieModel $categorie)
    {
        try {

            $query ="INSERT INTO categories (nom, code_raccourci) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$categorie->getNom(), $categorie->getCode()]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function getById($id)
    {
        
        try {
           
            $query = "SELECT * FROM Categories WHERE categorie_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new CategorieModel($row['nom'], $row['code']);
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
            $query = "SELECT * FROM Categories";
            $stmt = $this->pdo->query($query);
            $categorie = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorie[] = new CategorieModel($row['nom'], $row['code']);
            }

            return $categorie;
        } catch (PDOException $e) {

            return [];
        }
    }


    public function update(CategorieModel $categorie)
    {
        try {
            $query = "UPDATE Categories SET nom = ?, code = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$categorie->getNom(), $categorie->getCode(), $categorie->getId()]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM Categories WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }
}
?>