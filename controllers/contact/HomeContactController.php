<?php
class HomeContactController
{
        private $contactDAO;

        public function __construct(ContactDAO $contactDAO) {
            $this->contactDAO = $contactDAO;
        }

        public function index() {
            $contacts = $this->contactDAO->getAll();
            include('../../views/contact/home_contact.php');
        }
    }

require_once("../../config/config.php");
require_once("../../config/connexion.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/ContactDAO.php");
$contactDAO = new ContactDAO(new Connexion());
$controller = new HomeContactController($contactDAO);
$controller->index();