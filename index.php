<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php


if(isset($_POST['username']) && isset($_POST['password']) || isset($_SESSION['est_connecte']) && $_SESSION['est_connecte'] === true) {
    echo 'Vous êtes connecté';
    $_SESSION['est_connecte'] = true; // Flag si je suis connecté
}
else {
    ?>
    <form action="./index.php" method="POST">
        <input type="text" name="username" />
        <input type="password" name="password" />
        <input type="submit" />
    </form>
    <?php
}
?>


</body>
</html>
