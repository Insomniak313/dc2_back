<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<style>
    body {
        background-color: <?php
function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

echo rand_color();
?>;
    }

</style>

<ul>
<?php

// LEVE UN WARNING SI LE FICHIER N'EXISTE PAS
include 'entete.php';
include_once 'entete.php';


// LEVE UNE ERREUR FATAL SI LE FICHIER N'EXISTE PAS
require 'entete.php';
require_once 'entete.php';

class Test {
    private $titre;
    private $contenu;
    private $contenuAutre;

    public function __construct($titre, $contenu)
    {
        $this->titre = $titre;
        $this->contenu = $contenu;
    }

    public function setContenuAutre($contenuAutre) {
        $this->contenuAutre = $contenuAutre;
    }

    public function afficher() {
        echo $this->titre . '<br/>' . $this->contenu . '<br/>' . $this->contenuAutre;
    }

    public function afficherSeparateur() {
        echo '<hr/>';
    }
}

$test = new Test('titre', 'contenu');
$test->afficher();
$test->afficherSeparateur();
$test->setContenuAutre('contenuAutre');
$test->afficher();

$variable = 'toto';
$toto = 8;

$$variable = 12;

// $toto = 12

for($i=0;$i<10;$i++) {
    echo '<li>' . $i . '</li>';
}
?>
</ul>
</body>
</html>
