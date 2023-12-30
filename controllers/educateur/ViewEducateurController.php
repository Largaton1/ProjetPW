<?php
    class ViewEducateurController
    {
        private $educateurDAO;
        private $licencieDAO;
        public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
            $this->educateurDAO = $educateurDAO;
            $this->licencieDAO = $licencieDAO;
        }

        public function viewEducateur($educateurId) {
            // Récupérer le educateur à afficher en utilisant son ID
            $educateur = $this->educateurDAO->getById($educateurId);
            $licencie = $this->licencieDAO->getById($educateur->getNumeroLicence());

            // Inclure la vue pour afficher les détails du educateur
            include('../../views/educateur/view_educateur.php');
        }
    }

    $educateurDAO = new EducateurDAO(new Connexion());
    $licencieDAO = new LicencieDAO(new Connexion());
    $controller = new ViewEducateurController($educateurDAO, $licencieDAO);
    $controller->viewEducateur($_GET['id']);

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Educateur.php");
require_once("../../classes/models/Licencie.php");
require_once("../../classes/dao/EducateurDAO.php");
require_once("../../classes/dao/LicencieDAO.php");

?>