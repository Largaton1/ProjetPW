<?php
   
    session_start();

    if ($_POST['email'] == 'test@example.com' && $_POST['password'] == 'mdp') {
      
        $_SESSION['user'] = [
            'id' => 1,
            'nom' => 'Cyril',
            'prenom' => 'KONE',
            'email' => 'largaton95@gmail.com',
            'est_administrateur' => true
        ];

        header('Location: index.php'); // Redirection vers la page dédiée à l'administrateur
        exit();
    } else {
        header('Location: login.php?error=1');
        exit();
    }
?>