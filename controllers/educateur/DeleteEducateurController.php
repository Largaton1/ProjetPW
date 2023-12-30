<?php
    class DeleteEducateurController
    {
        private $educateurDAO;
        public function __construct(EducateurDAO $educateurDAO) {
            $this->educateurDAO =  $educateurDAO;
        }

        public function deleteEducateur($educateurId) {
            // Récupérer le contact à supprimer en utilisant son ID
            $educateur = $this->educateurDAO->getById($educateurId);

            if (!$educateur) {
                // L'educateur n'a pas été trouvé !
                echo "L'educateur  n'a pas été trouvé.";
                return;
            }
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if ($this->educateurDAO->deleteById($educateurId)) {
                    header('Location:ListEducateurController.php');
                    exit();
                } else {
                    // Gérer les erreurs de suppression du contact
                    echo "Erreur lors de la suppression";
                }
            }
        }
    }
    require_once("../../config/config.php");
    require_once("../../config/connexion.php");
    require_once("../../classes/models/Educateur.php");
     require_once("../../classes/dao/EducateurDAO.php");
  
$contactDAO = new EducateurDAO(new Connexion());
$controller = new DeleteEducateurController($contactDAO);
$controller->deleteEducateur($_GET['id']);

?>