<?php
class EducateurDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(EducateurModel $educateur)
    {
        try {
            $query = "INSERT INTO educateurs (licencie_id , email, password, est_administrateur) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$educateur->getLicenceID(), $educateur->getemail(), $educateur->getpassword(), $educateur->getAdmin()]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $query = "SELECT * FROM educateurs WHERE educateur_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['licencie_id'], $row['email'], $row['password'], $row['est_administrateur']);
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
            $query = "SELECT * FROM educateurs";
            $stmt = $this->pdo->query($query);
            $educateur = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateur[] = new EducateurModel($row['licencie_id'], $row['email'], $row['password'], $row['est_administrateur']);
            }
            return $educateur;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update(EducateurModel $educateur,$id)
    {
        try {
            if ($educateur->getLicenceID() !=""){
                $query = "UPDATE educateurs,licencies SET licencie_id = ? WHERE educateur_id = $id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$educateur->getLicenceID()]);
                }
            if ($educateur->getemail() !=""){
                $query = "UPDATE educateurs SET email = ? WHERE educateur_id = $id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$educateur->getemail()]);
                } 
            if ($educateur->getpassword() !=""){
                $query = "UPDATE educateurs SET password = ? WHERE educateur_id = $id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$educateur->getpassword()]);
                } 
            if ($educateur->getAdmin() !=""){
                $query = "UPDATE educateurs SET est_administrateur = ? WHERE educateur_id = $id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$educateur->getAdmin()]);
                }       
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id)
    {
        try {
            $query  = "DELETE FROM educateurs WHERE educateur_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>