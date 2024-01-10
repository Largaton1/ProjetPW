<?php
// Inclure le contrôleur pour récupérer les données des licenciés
require_once("../../controllers/licencie/IndexLicencieController.php");

require_once("../../classes/models/Contact.php");
require_once("../../classes/models/Categorie.php");
require_once("../../classes/dao/ContactDAO.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Liste des licenciés</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include("../../sections/navbar.php") ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
  <?php include("../../sections/aside.php") ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Liste des licencies</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active">Licencies</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h3 class="card-title">Liste des licencies</h3>
                <a href="../../controllers/licencie/AddLicencieController.php" class="btn btn-primary ml-auto justify-content-end">Ajout des licenciés</a>
                <!-- <a href="../../controllers/licencie/AddLicencieController.php" class="btn btn-success ml-auto justify-content-between">Import</a> -->

                <input type="file" id="importFile" style="display: none; color:darkgray">
               <button onclick="$('#importFile')[0].click();">Importer des licenciés</button>
              </div>
            
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
      <th>ID</th>
        <th>Numero Licencié</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Contact</th>
        <th>Categories</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($licencies as $licencie): ?>
        <tr>
    
        <td><?php echo $licencie->getIdLicencie(); ?></td>
          <td><?php echo $licencie->getNumeroLicencie(); ?></td>
          <td><?php echo $licencie->getNom(); ?></td>
          <td><?php echo $licencie->getPrenom(); ?></td>
     
          <td><?php echo $licencie->getContact()->getId() ?></td>
          <td><?php echo $licencie->getCategorie()->getIdCategorie(); ?></td>
      
          <td><a class="tooltips" href="../../controllers/licencie/DeleteLicencieController.php?Id=<?php echo $licencie->getIdLicencie();  ?>"><i class="fa fa-trash" style="color:orangered"></i></a>
          <a class="tooltips" href="../../controllers/licencie/EditLicencieController.php?Id=<?php echo $licencie->getIdLicencie();  ?>"><i class="fa fa-edit" style="color:rgb(18, 219, 18);"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
