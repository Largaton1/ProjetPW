<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
<h1>Ajouter un Educateur</h1>
<a href="HomeEducateurController.php">Retour à la liste des educateurs</a>

    <form action="AddEducateurController.php" method="post">
        <label for="password">Mot de passe :</label>
        <input type="text" id="password" name="password" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email"><br>

        <label for="est_administrateur">Administrateur</label>
        <select name="est_administrateur" id="est_administrateur">
            <option value="non">Non</option>
            <option value="oui">Oui</option>
        </select>
        <br><br>
        <label for="numero_licence">Licencié :</label>
        <select name="numero_licence" id="numero_licence">
            <?php
            foreach ($licence as $number) {
                echo "<option value='{$number->getNumeroLicence()}'>{$number->getNom()}</option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" name="action" value="Ajouter">
    </form>
</body>
</html>