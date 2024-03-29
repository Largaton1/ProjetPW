<?php require_once("../../classes/models/Contact.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Supprimer contact</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
</head>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "projetpw";

// Vérifier si la session est active
if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location: ../../views/login.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

require_once '../../classes/dao/EducateurDAO.php';

$conn = new Connexion();
$educateurDAO = new EducateurDAO($conn);
$login=$_SESSION['username'];
if ($educateurDAO->isAdmin($login)==true) {
   
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("../../sections/navbar.php") ?>
  <!-- /.navbar -->
  <?php include("../../sections/aside.php") ?>
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
 
 
  <div class="content-wrapper">
    <a href="../../controllers/contact/IndexContactController.php">Retour à la liste des contacts</a>
    
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Supprimer un contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if ($contact): ?>
                <p>Voulez-vous vraiment supprimer un contact "<?php echo $contact->getNomContact(); ?>: <?php echo $contact->getPrenom(); ?>" ?</p>
        <form action="../../controllers/contact/DeleteContactController.php?Id=<?php echo $contact->getId(); ?>" method="post">
            <input type="submit" value="Supprimer" class="btn btn-warning">
        </form>
        <?php else: ?>
        <p>Le contact n'a pas été trouvée.</p>
    <?php endif; ?>
        
    </div>
           
</div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<?php 

}else {
  echo "Action reservée au admin";
}
?>

</body>
</html>
