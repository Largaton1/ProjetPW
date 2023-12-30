<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Educateur</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- ... (Autres feuilles de style) -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php include("navbar.php") ?>
        <!-- /.navbar -->

        <!-- Sidebar -->
        <?php include("aside.php") ?>
        <!-- /.sidebar -->

        <div class="content-wrapper">
            <div class="row m-lg-3">
                <div class="col-md-12">

                    <!-- Card for Form -->
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: orangered;">
                            <h3 class="card-title">Création d'éducateurs</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- Form Section -->
                        <form action="AddEducateurController.php" method="post">

                            <a href="HomeEducateurController.php">Retour à la liste des éducateurs</a>

                            <!-- Input Fields -->
                            <label for="password">Mot de passe :</label>
                            <input type="password" id="password" name="password" required minlength="8"><br>

                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required><br>

                            <label for="est_administrateur">Administrateur</label>
                            <select name="est_administrateur" id="est_administrateur">
                                <!-- ... (Options pour administrateur) -->
                            </select>
                            <br><br>

                            <label for="numero_licence">Licencié :</label>
                            <select name="numero_licence" id="numero_licence">
                                <?php foreach ($licence as $number): ?>
                                    <option value="<?= htmlspecialchars($number->getNumeroLicence()) ?>">
                                        <?= htmlspecialchars($number->getNom()) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br><br>

                            <!-- Submit Button -->
                            <input type="submit" name="action" value="Ajouter">
                        </form>
                        <!-- End of Form -->

                    </div>
                    <!-- End of Card -->

                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <!-- ... (Contenu du footer) -->
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- ... (Contenu de la barre latérale de contrôle) -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- JavaScript -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- ... (Autres scripts) -->
    <script src="dist/js/pages/dashboard.js"></script>

</body>

</html>
