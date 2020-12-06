<?php
session_start();

function isAlreadyConnected() {
    return isset($_SESSION['est_connecte']) AND $_SESSION['est_connecte'];
}

function isFormCompleated() {
    return isset($_POST['username']) AND isset($_POST['password']);
}

function logOutUser() {
    $_POST = array();
    $_SESSION = array();
    session_destroy();
    header('Refresh:0');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php

// Checking if we clicked 'Se déconnecter'
if (isset($_POST['log_out'])) {
    logOutUser();
} elseif (isFormCompleated() OR isAlreadyConnected()) {
    $_SESSION['est_connecte'] = true; // Flag si je suis connecté
    ?>
    <p>Vous êtes connecté.</p>
    <form action="./index.php" method="POST">
        <input type="hidden" name="log_out" />
        <input type="submit" value="Se déconnecter" />
    </form>
    <?php
} else {
    ?>
    <form action="./index.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" />
        <input type="password" name="password" placeholder="Mot de passe" />
        <input type="submit" value="Se connecter" />
    </form>
    <?php
}
?>


</body>
</html>
