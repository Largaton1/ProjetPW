<?php
require_once("../../classes/models/Categorie.php");
require_once("../../classes/models/Licencie.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/CategorieDAO.php");
require_once("../../classes/dao/LicencieDAO.php");
require_once("../../classes/dao/ContactDAO.php");
class LicencieDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    public function create(Licencie $licencie) {
        $contactDAO = new ContactDAO($this->connexion);
        $categorieDAO = new CategorieDAO($this->connexion);
        $query = "INSERT INTO licencies (numero_licencie, nom, prenom, contact_id, categorie_id) VALUES (:numero_licencie, :nom, :prenom, :contact_id, :categorie_id)";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':numero_licencie', $licencie->getNumeroLicencie());
        $stmt->bindValue(':nom', $licencie->getNom());
        $stmt->bindValue(':prenom', $licencie->getPrenom());
        $stmt->bindValue(':contact_id',$licencie->getContact()->getId());
        $stmt->bindValue(':categorie_id',$licencie->getCategorie()->getIdCategorie() );
        $stmt->execute();
        return $this->connexion->pdo->lastInsertId();
    }

    public function getById($id){
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencies WHERE licencie_id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
            if ($row) {
                $contactDAO = new ContactDAO($this->connexion);
                $categorieDAO = new CategorieDAO($this->connexion);
 
                $contact = $contactDAO->getById($row['contact_id']);
                $categorie = $categorieDAO->getById($row['categorie_id']);
 
                $licencies = new Licencie($row['licencie_id'],$row['numero_licencie'], $row['nom'], $row['prenom'], $contact,$categorie);
                return $licencies;
                
            } else {
                return null; // Aucun licencié trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    public function getAll(){
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencies");
            $licencies = [];
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contactDAO = new ContactDAO($this->connexion);
                $categorieDAO = new CategorieDAO($this->connexion);
                $contact = $contactDAO->getById($row['contact_id']);
                $categorie = $categorieDAO->getById($row['categorie_id']);
            $licencie = new Licencie($row['licencie_id'],$row['numero_licencie'], $row['nom'], $row['prenom'], $contact,$categorie);
                $licencies[] = $licencie;
                
            }
            return $licencies  ;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // public function getAll()
    // {
    //     try {
    //         $stmt = $this->connexion->pdo->query("SELECT l.licencie_id, l.numero_licencie, l.nom, l.prenom, c.nom_categorie, c.code_raccourci, ct.nom_contact, ct.email, ct.telephone FROM licencies l JOIN categories c ON l.categorie_id = c.categorie_id JOIN contacts ct ON l.contact_id = ct.contact_id;
    //  ");
         
    //      $licencies = []; // Initialisation du tableau pour stocker les objets Licencie

    //      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //         // $contact = new Contact($row['contact_id'],$row['nom_contact'],$row['prenom_contact'], $row['email'], $row['telephone']);
    //         // $categorie = new Categorie($row['categorie_id'],$row['nom_categorie'], $row['code_raccourci']);
    //         $contactDAO = new ContactDAO($this->connexion);
    //                   $categorieDAO = new CategorieDAO($this->connexion);
    //                      $contact = $contactDAO->getById($row['contact_id']);
    //                     $categorie = $categorieDAO->getById($row['categorie_id']);
    //          // Création d'un nouvel objet Licencie avec les données récupérées de la requête
    //           $licencie = new Licencie($row['licencie_id'],$row['numero_licencie'], $row['nom'], $row['prenom'], $contact,$categorie);
             
    //          // Ajout de l'objet Licencie créé au tableau des licenciés
    //          $licencies[] = $licencie;
    //          return $licencies;
  
    //      }
         
    //     } catch (PDOException $e) {
    //         return [];
    //     }
    // }


    public function update(Licencie $licencie) {
        try {
            $sql = "UPDATE licencies SET numero_licencie=?, nom=?, prenom=?, contact_id=?, categorie_id=? WHERE licencie_id=?";
            $stmt = $this->connexion->pdo->prepare($sql);
     
            $contactId = $licencie->getContact() ? $licencie->getContact()->getId() : null;
            $categorieId = $licencie->getCategorie() ? $licencie->getCategorie()->getIdCategorie() : null;
     
            $stmt->execute([$licencie->getNumeroLicencie(), $licencie->getNom(), $licencie->getPrenom(), $contactId, $categorieId, $licencie->getIdLicencie()]);
            return true;
        } catch (PDOException $e) {
            // Handle the error
            return false;
        }
     }
     
    

   
    
    public function delete($id) {
        try {
            $query = "DELETE FROM licencies WHERE licencie_id = :id";
        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
 
        return $stmt->rowCount();
        } catch (PDOException $e) {
            // Gérer l'erreur
            return false;
        }
    }

    public function importer($cheminFichier) {
        $file = fopen($cheminFichier, "r");
        while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
            $licencie = new Licencie('licencie_id','numero_licencie', 'nom', 'prenom', 'contact_id', 'categorie_id');
            $licencie->setNom($data[0]);
           
            $this->create($licencie);
        }
        fclose($file);
    }
    
}
?>