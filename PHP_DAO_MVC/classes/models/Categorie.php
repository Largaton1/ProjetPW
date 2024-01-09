<?php
    class Categorie {
        private $categorie_id;
        private $nom_categorie;
        private $code_raccourci;

        public function __construct($categorie_id, $nom_categorie, $code_raccourci) {
            $this->categorie_id = $categorie_id;
            $this->nom_categorie = $nom_categorie;
            $this->code_raccourci = $code_raccourci;
        }

        // Getters
        public function getIdCategorie() { 

            return $this->categorie_id; 
        }
        public function getNom() {

            return $this->nom_categorie; 
        }
        public function getCodeRaccourci() { 

            return $this->code_raccourci;
         }

        // Setters
        public function setIdCategorie($categorie_id) {
             $this->categorie_id = $categorie_id; 
            }
        public function setNom($nom_categorie) { 
            $this->nom_categorie = $nom_categorie;
         }
        public function setCodeRaccourci($code_raccourci) {
             $this->code_raccourci = 
             $code_raccourci;
             }
    }