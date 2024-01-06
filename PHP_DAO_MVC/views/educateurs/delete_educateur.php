<?php
// Vous devez inclure le fichier avec la logique métier pour la suppression d'un licencié
require_once("../../controllers/licencie/DeleteLicencieController.php");

// Vérifier si un identifiant de licencié a été fourni dans l'URL

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- ... Les balises meta et les liens vers les fichiers CSS et les scripts ... -->
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supprimer un educateur</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
      <?php if ($educateur): ?>
        <p>
            Voulez-vous vraiment supprimer l'éducateur "<?php echo $educateur->getEmail(); ?>
             <?php echo $educateur->getPassword(); ?>"

        </p>

        <form action="DeleteEducateurController.php?id=<?php echo $educateur->getId(); ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>L'educateur n'a pas été trouvé.</p>
    <?php endif; ?>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Les scripts JavaScript -->
</body>
</html>
