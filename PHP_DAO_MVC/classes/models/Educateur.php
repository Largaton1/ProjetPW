<?php
// require_once("../../classes/models/Licencie.php");
    class Educateur {
        private $educateur_id;
        private $numero_licencie;
        private $licencie_id;
        private $email;
        private $mot_de_passe;
        private $est_administrateur;
        

        public function __construct($educateur_id, $licencie_id, $email, $mot_de_passe, $est_administrateur) {
            // if(is_int($educateur_id))
            // {
            //     $this->educateur_id = $educateur_id;
            // }
            $this->educateur_id = $educateur_id;
            $this->licencie_id = $licencie_id;
            $this->email = $email;
            $this->mot_de_passe = $mot_de_passe;
            $this->est_administrateur = $est_administrateur;
        }

        // Getters
        public function getIdEducateur() { return $this->educateur_id; }
        public function getNumeroLicencie() { return $this->numero_licencie; }
        public function getEmail() { return $this->email; }
        public function getMotDePasse() { return $this->mot_de_passe; }
        public function getEstAdministrateur() { return $this->est_administrateur; }

        // Setters
       
        public function setIdEducateur($educateur_id) { 
            $this->educateur_id = $educateur_id; }
        public function setNumeroLicence($numero_licencie) {
             $this->numero_licencie = $numero_licencie; }
        public function setEmail($email) {
             $this->email = $email; }
        public function setPassword($mot_de_passe) { 
            $this->mot_de_passe = $mot_de_passe; }
        public function setEstAdministrateur($est_administrateur) { 
            $this->est_administrateur = $est_administrateur; }

        /**
         * Get the value of licencie_id
         */ 
        public function getIdLicencie()
        {
            return $this->licencie_id; 
        }
        public function setIdLicencie($licencie_id) {
            $this->licencie_id = $licencie_id; }
    }