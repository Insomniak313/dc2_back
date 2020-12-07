<?php


/**
 * Class Application
 * Classe permettant de récupérer le paramètre "p" dans l'URL et
 * d'aiguiller vers la bonne application
 */
class Application {

    /**
     * Fonction principale de notre application
     */
    public function lancer() {
        $routeur = new Routeur();
        $routeur->trouveRoute($_GET['p']);
    }
}

/**
 * Class Routeur
 * Classe permettant d'afficher la bonne page (texte affiché par une fonction d'une classe)
 * en fonction d'une url
 */
class Routeur {

    /**
     * Fonction permettant d'afficher la bonne page en fonction d'une URL
     * @param $url
     */
    public function trouveRoute($url) {
        // En fonction de l'URL on va récupérer le contenu dans un controleur ou un autre
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

        // Ensuite on affiche (echo) la page avec son contenu
        $rootControleur = new RootControleur();
        $rootControleur->afficherPage($contenu);
    }
}

/**
 * Class RootControleur
 * Notre template de page principal, qui va inclure les autres
 */
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

/**
 * Class HomeControleur
 * Page d'accueil
 */
class HomeControleur {
    public function index() {
        return '<div>HOME</div>';
    }
}

/**
 * Class AboutControleur
 * Page a propos
 */
class AboutControleur {
    public function index() {
        return '<div>ABOUT</div>';
    }
}

/**
 * Class ErrorControleur
 * Page d'erreur
 */
class ErrorControleur {
    public function index() {
        return '<div>ERROR</div>';
    }
}

// On instancie l'application (on crée un nouvel objet de type Application)
$app = new Application();
// Et on lance l'app
$app->lancer();

