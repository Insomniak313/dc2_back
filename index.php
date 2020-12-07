<?php


class Application {

    public function lancer() {
        $routeur = new Routeur();
        $routeur->trouveRoute($_GET['p']);
    }
}

class Routeur {
    public function trouveRoute($url) {
        $rootControleur = new RootControleur();
        switch ($url) {
            case 'home':
                $controleur = new HomeControleur();
                $contenu = $controleur->index();
                break;

            case 'about':
                $controleur = new AboutControleur();
                $contenu = $controleur->index();
                break;

            default:
                $controleur = new ErrorControleur();
                $contenu = $controleur->index();
                break;
        }

        $rootControleur->afficherPage($contenu);
    }
}

class RootControleur {
    public function afficherPage($contenu) {
        echo '<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>' . $contenu . '
</body>
</html>';
    }
}

class HomeControleur {
    public function index() {
        return '<div>HOME</div>';
    }
}


class AboutControleur {
    public function index() {
        return '<div>ABOUT</div>';
    }
}


class ErrorControleur {
    public function index() {
        return '<div>ERROR</div>';
    }
}

$app = new Application();
$app->lancer();

