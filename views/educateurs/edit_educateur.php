<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un éducateur</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Modifier un Éducateur</h1>
    <a href="HomeEducateurController.php">Retour à la liste des éducateurs</a>

    <form action="EditEducateurController.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET["id"]) ?>" />
        
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($educateur->getEmail()) ?>"><br>

        <label for="est_administrateur">Administrateur</label>
        <select name="est_administrateur" id="est_administrateur">
            <option value="non" <?= $educateur->getEstAdministrateur() == 0 ? 'selected' : '' ?>>Non</option>
            <option value="oui" <?= $educateur->getEstAdministrateur() == 1 ? 'selected' : '' ?>>Oui</option>
        </select>
        <br><br>

        <label for="numero_licence">Licencié :</label>
        <select name="numero_licence" id="numero_licence">
            <?php foreach ($licence as $number): ?>
                <option value="<?= htmlspecialchars($number->getNumeroLicence()) ?>" <?= ($number->getNumeroLicence() === $educateur->getNumeroLicence()) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($number->getNom()) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        
        <input type="submit" name="action" value="Modifier">
    </form>
</body>
</html>
