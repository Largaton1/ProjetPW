<?php
    class Categorie {
        private $id_categorie;
        private $nom_categorie;
        private $code_raccourci;

        public function __construct($id_categorie, $nom_categorie, $code_raccourci) {
            $this->id_categorie = $id_categorie;
            $this->nom_categorie = $nom_categorie;
            $this->code_raccourci = $code_raccourci;
        }

        // Getters
        public function getIdCategorie() { 

            return $this->id_categorie; 
        }
        public function getNom() {

            return $this->nom_categorie; 
        }
        public function getCodeRaccourci() { 

            return $this->code_raccourci;
         }

        // Setters
        public function setIdCategorie($id_categorie) {
             $this->id_categorie = $id_categorie; 
            }
        public function setNom($nom_categorie) { 
            $this->nom_categorie = $nom_categorie;
         }
        public function setCodeRaccourci($code_raccourci) {
             $this->code_raccourci = 
             $code_raccourci;
             }
    }