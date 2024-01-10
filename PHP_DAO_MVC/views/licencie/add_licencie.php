
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("../../sections/navbar.php") ?>
  <!-- /.navbar -->
  <?php include("../../sections/aside.php") ?>
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
 
 
  <div class="content-wrapper">
    <a href="../../controllers/licencie/IndexLicencieController.php">Retour à la liste des licenciés</a>

    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajout d'un nouveau licencié</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../../controllers/licencie/AddLicencieController.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="numero_licencie">Numero Licencié</label>
                    <input name= "numero_licencie" type="text" class="form-control" id="numero_licencie" >
                  </div>
                  <div class="form-group">
                    <label for="nom">Nom: </label>
                    <input name="nom" type="text" class="form-control" id="nom" >
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prenom</label>
                    <input name= "prenom" type="text" class="form-control" id="prenom" >
                  </div>
                  <div class="form-group">
                    <label for="contact">Contact:</label>
                    <select class="custom-select form-control-border" id="contact_id" name="contact_id">
                      <option value = "">Selectionner un contact</option>
                      <?php foreach ($contacts as $contact): ?>
                      <option value="<?= $contact->getId(); ?>"><?= $contact->getNomContact().' '.$contact->getPrenom(); ?></option>
                  <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="categorie_id">Categories</label>
                    <select class="custom-select form-control-border" id="categorie_id" name="categorie_id">
                      <option value = "">Selectionner une categorie</option>
                      <?php foreach ($categories as $categorie): ?>
                      <option value="<?= $categorie->getIdCategorie(); ?>"><?= $categorie->getNom();?></option>
                  <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="action">Ajouter</button>
                </div>
              </form>
            </div>
</div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
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


</body>
</html>
