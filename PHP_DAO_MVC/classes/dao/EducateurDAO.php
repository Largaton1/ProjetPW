<?php
    class EducateurDAO {
        private $connexion;

        public function __construct(Connexion $connexion) {
            $this->connexion = $connexion;
        }

        public function create(Educateur $educateur) {
            try {
                $stmt = $this->connexion->pdo->prepare("INSERT INTO educateurs (licencie_id, email, mot_de_passe, est_administrateur) VALUES (?, ?, ?, ?)");
                $stmt->execute([$educateur->getIdLicencie(), $educateur->getEmail(), $educateur->getMotDePasse(), $educateur->getEstAdministrateur()]);
                return true;
            } catch (PDOException $e) {
                print_r($e->getMessage());
                return false;
            }
        }

        // public function getById($id) {
        //     try {
        //         $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE educateur_id = ?");
        //         $stmt->execute([$id]);
        //         $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //         if ($row) {
        //             return new Educateur($row['educateur_id'], $row['licencie_id'], $row['email'], $row['mot_de_passe'], $row['est_administrateur']);
        //         } else {
        //             return null;
        //         }
        //     } catch (PDOException $e) {
        //         return null;
        //     }
        // }

        public function getById($id) {
            try {
                $query = "SELECT * FROM educateurs WHERE educateur_id = ?";
                $stmt = $this->connexion->pdo->prepare($query);
                $stmt->execute([$id]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    return new Educateur($row['educateur_id'], $row['licencie_id'], $row['email'], $row['mot_de_passe'], $row['est_administrateur']);
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                return null;
            }
        }



        public function getByEmail($email) {
            try {
                $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE email = ?");
                $stmt->execute([$email]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    return new Educateur($row['educateur_id'], $row['licencie_id'], $row['email'], $row['mot_de_passe'], $row['est_administrateur']);
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                return null;
            }
        }

        public function getAll() {
            try {
                $stmt = $this->connexion->pdo->query("SELECT * FROM educateurs");
                $educateurs = [];

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $educateurs[] = new Educateur($row['educateur_id'], $row['licencie_id'], $row['email'], $row['mot_de_passe'], $row['est_administrateur']);
                }

                return $educateurs;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function update(Educateur $educateur) {
            try {
                $stmt = $this->connexion->pdo->prepare("UPDATE educateurs SET id_educateur = ?, licencie_id = ?, email = ?, mot_de_passe = ?, est_administrateur = ? WHERE educateur_id = ?");
                $stmt->execute([$educateur->getIdEducateur(), $educateur->getEmail(), $educateur->getMotDePasse(), $educateur->getEstAdministrateur()]);
                return true;
            } catch (PDOException $e) {
                print_r($e->getMessage());
                return false;
            }
        }

        public function deleteById($id) {
            try {
                $stmt = $this->connexion->pdo->prepare("DELETE FROM educateurs WHERE educateur_id = ?");
                $stmt->execute([$id]);
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
        public function isAdmin($email) {
            try {
                $stmt = $this->connexion->pdo->prepare("SELECT COUNT(*) FROM educateurs WHERE email = ? AND est_administrateur = 1");
                $stmt->execute([$email]);
                $resultat = $stmt->fetchColumn();
                return $resultat > 0;
            } catch (PDOException $e) {
                return false;
            }
        }
        
        public function getConnexion($email,$password) {
            try {
                $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE email = ? AND mot_de_passe = ? AND est_administrateur=1 ");
                $stmt->execute([$email,$password]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($row) {
                    return new Educateur($row['educateur_id'], $row['licencie_id'], $row['email'], $row['mot_de_passe'], $row['est_administrateur']);
                } else {
                    return null; 
                }
            } catch (PDOException $e) {
                // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
                return null;
            }
    }}

    ?>