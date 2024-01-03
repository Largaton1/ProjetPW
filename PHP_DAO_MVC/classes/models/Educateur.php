<?php
    class Educateur {
        private $id_educateur;
        private $numero_licence;
        private $email;
        private $password;
        private $est_administrateur;

        public function __construct($id_educateur, $numero_licence, $email, $password, $est_administrateur) {
            if(is_int($id_educateur))
            {
                $this->id_educateur = $id_educateur;
            }
            $this->numero_licence = $numero_licence;
            $this->email = $email;
            $this->password = $password;
            $this->est_administrateur = $est_administrateur;
        }

        // Getters
        public function getIdEducateur() { return $this->id_educateur; }
        public function getNumeroLicence() { return $this->numero_licence; }
        public function getEmail() { return $this->email; }
        public function getMotDePasse() { return $this->password; }
        public function getEstAdministrateur() { return $this->est_administrateur; }

        // Setters
        public function addEducateur($numero_licence, $email, $password, $est_administrateur){
            $this->numero_licence = $numero_licence;
            $this->email = $email;
            $this->password = $password;
            $this->est_administrateur = $est_administrateur;
        }
        public function setIdEducateur($id_educateur) { 
            $this->id_educateur = $id_educateur; }
        public function setNumeroLicence($numero_licence) {
             $this->numero_licence = $numero_licence; }
        public function setEmail($email) {
             $this->email = $email; }
        public function setPassword($password) { 
            $this->password = $password; }
        public function setEstAdministrateur($est_administrateur) { 
            $this->est_administrateur = $est_administrateur; }
    }