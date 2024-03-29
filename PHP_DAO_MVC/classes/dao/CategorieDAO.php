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
                $categories[] = new Categorie($row['categorie_id'], $row['nom_categorie'], $row['code_raccourci']);
            }
            return $categories;
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération ici
            return [];
        }
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM categories WHERE categorie_id = ?";
        $stmt = $this->connexion->pdo->prepare($sql);
        //  $stmt->bindParam(':id', $id);
            //  $stmt->execute();
         $stmt->execute([$id]);

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch();
            return new Categorie($row['categorie_id'], $row['nom_categorie'], $row['code_raccourci']);
        } else {
            return null;
        }
    }

    public function create(Categorie $categorie)
    {
        $sql = "INSERT INTO categories (nom_categorie, code_raccourci) VALUES (:nom_categorie, :code_raccourci)";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->bindValue(':nom_categorie', $categorie->getNom());
        $stmt->bindValue(':code_raccourci', $categorie->getCodeRaccourci());
        $stmt->execute();

        return $this->connexion->pdo->lastInsertId();
    }

    // public function update(Categorie $categorie)
    // {
    //     $sql = "UPDATE categories SET nom_categorie, code_raccourci WHERE categorie_id = ?";
    //     $stmt = $this->connexion->pdo->prepare($sql);
    // //  $stmt->execute([$id]);

    //      $stmt->bindParam(':code_raccourci', $categorie->getCodeRaccourci());
    //      $stmt->execute();
    //  }

    public function update(Categorie $categorie)
{
    try {
        $sql = "UPDATE categories SET nom_categorie = ?, code_raccourci = ? WHERE categorie_id = ?";
        $stmt = $this->connexion->pdo->prepare($sql);
        $stmt->execute([$categorie->getNom(), $categorie->getCodeRaccourci(), $categorie->getIdCategorie()]);
        return true;
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        return false;
    }
}


    public function deleteById($id)
    {
        $sql = "DELETE FROM categories WHERE categorie_id = :id";
        $stmt = $this->connexion->pdo->prepare($sql);
         $stmt->bindParam(':id', $id);
         $stmt->execute();
        // $stmt->execute([$id]);
    }
}