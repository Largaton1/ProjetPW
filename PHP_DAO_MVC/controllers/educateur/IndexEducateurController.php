<?php

    class IndexEducateurController
    {
        private $educateurDAO;

        public function __construct(EducateurDAO $educateurDAO) {
            $this->educateurDAO = $educateurDAO;
        }

        public function index() {
            $educateurs = $this->educateurDAO->getAll();
           
            include('../../views/educateurs/index_educateur.php');
        }
    }

    require_once("../../config/config.php");
    require_once("../../config/connexion.php");
    require_once("../../classes/models/Educateur.php");
     require_once("../../classes/dao/EducateurDAO.php");
$educateurDAO = new EducateurDAO(new Connexion());
$controller = new IndexEducateurController($educateurDAO);
$controller->index();
?>