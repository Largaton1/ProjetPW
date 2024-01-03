<?php

class CategorieDAO


{

    private $connexion;

    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }


    public function create(Categorie $categorie)
    {
        try {

            $query ="INSERT INTO Categories (nom, code_raccourci) VALUES (?, ?)";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->execute([$categorie->getNom(), $categorie->getCodeRaccourci()]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function getById($id)
    {
        
        try {
           
            $query = "SELECT * FROM Categories WHERE id = ?";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new Categorie($row['id'], $row['nom'], $row['code_raccourci']);
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
            $stmt = $this->connexion->pdo->prepare($query);
            $categorie = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorie[] = new Categorie($row ['id_categorie'],$row['nom'], $row['code_raccourci']);
            }

            return $categorie;
        } catch (PDOException $e) {

            return [];
        }
    }

    public function update(Categorie $categorie)
    {
        try {
            $query = "UPDATE Categories SET nom = ?, code = ? WHERE id = ?";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->execute([$categorie->getNom(), $categorie->getCodeRaccourci(), $categorie->getIdCategorie()]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM Categories WHERE id = ?";
            $stmt = $this->connexion->pdo->prepare($query);
            $stmt->execute([$id]);

            $queryUpdateLicencies = "UPDATE Licencies SET id = '' WHERE id = :id";
            $stmtUpdateLicencies = $this->connexion->pdo->prepare($queryUpdateLicencies);
            $stmtUpdateLicencies->bindParam(':id', $id);
            $stmtUpdateLicencies->execute();
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }
  
    }

?>