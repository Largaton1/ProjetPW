<?php require_once("../../classes/models/Licencie.php"); ?>
<?php require_once("../../classes/models/Categorie.php"); ?>
<?php require_once("../../classes/models/Contact.php"); ?>

<?php require_once("../../controllers/licencie/EditLicencieController.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Club sportif</title>

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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include("../../sections/navbar.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("../../sections/aside.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <a href="../../controllers/licencie/IndexLicencieController.php">Retour à la liste des licenciés</a>

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Modifier un licencié</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->   
        <?php if (isset($licencie)) : ?>
          <form action="../../controllers/licencie/EditLicencieController.php?Id=<?php echo $licencie->getIdLicencie(); ?>" method="post">
            <div class="card-body">
              <div class="form-group row">
                <input type="hidden" name="licencie_id" value="<?php echo $licencie->getIdLicencie(); ?>">

              </div>
              <div class="form-group">
                <label for="numero_licencie">Numero Licencie</label>
                <input name="numero_licencie" type="text" class="form-control" id="numero_licencie"  value="<?php echo $licencie->getNumeroLicencie(); ?>">
              </div>
              <div class="form-group">
                <label for="nom">Nom </label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $licencie->getNom(); ?>">
              </div>
              <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $licencie->getPrenom(); ?>">
              </div>
              <div class="form-group">
                <label for="contact">Contact</label>
                <select class="custom-select form-control-border" id="contact_id" name="contact_id">
                  <option value="">Selectionner un contact</option>
                  <?php foreach ($contacts as $contact) : ?>
                    <option value="<?php echo $contact->getId(); ?>"><?php echo $contact->getNomContact(); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="categorie_id">Categories</label>
                <select class="custom-select form-control-border" id="categorie_id" name="categorie_id">
                  <option value="">Selectionner une categorie</option>
                  <?php foreach ($categories as $categorie) : ?>
                    <option value="<?php $categorie->getIdCategorie(); ?>"><? $categorie->getNom(); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-success" name="action">Modifier</button>
            </div>
          </form>
        <?php else : ?>
          <p>La licencie n'a pas été trouvée.</p>
        <?php endif; ?>
      </div>

      <!-- /.content-wrapper -->
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
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
    </div>
    
</body>

</html>