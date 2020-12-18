<?php


// Protocole (HTTP, HTTPS, PING)
// Adresse IP
$pdo = new PDO('mysql:host=127.0.0.1;dbname=VOTRE_BASE_DE_DONNEES', 'root', '');
// $pdo = new PDO('pgsql:host=192.168.32.5;dbname=digital_campus', 'postgres', 'postgres');

$resultats = $pdo->query('SELECT * FROM utilisateurs');

echo '<ul>';
foreach ($resultats as $ligne) {
    echo '<li>' . $ligne['login'] . '</li>';
}

echo '</ul>';
