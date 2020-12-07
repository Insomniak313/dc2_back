<?php

/**
 * Class ClasseDeBase
 * Cette classe représente notre classe de "base"
 * Une de ses méthodes est abstraite (obtenir_increment) on doit donc également définir la classe comme "abstract"
 */
abstract class ClasseDeBase
{
    /**
     * @var $proprietePrivate int
     * Une propriété privée de notre objet : elle est accessible qu'au sein de ClasseDeBase
     */
    private $proprietePrivate;

    /**
     * @var $proprieteProtected int
     * Une propriété protected de notre objet : elle est accessible au sein de notre classe
     * ClasseDeBase mais aussi au sein des classes qui vont étendre ClasseDeBase
     */
    protected $proprieteProtected;

    /**
     * @var $proprietePublic int
     * Une propriété public de notre objet : elle accessible de partout
     */
    public $proprietePublic;

    /**
     * Constructeur
     * Représente la fonction "new"
     * On peut initialiser des variables de notre objet
     */
    public function __construct($prop_1, $prop_2)
    {
        $this->proprietePrivate = $prop_1;
        $this->proprieteProtected = $prop_2;
        $this->proprietePublic = 'valeur par défaut';
    }

    /**
     * Méthode publique permettant d'incrémenter (ajouter un entier à) la propriété  proprietePrivate
     * L'incrément est récupéré grâce à la fonction obtenir_increment
     */
    public function incrementer()
    {
        $this->proprietePrivate = $this->proprietePrivate + $this->obtenir_increment();
    }

    /**
     * Méthode publique permettant d'afficher la propriété "proprietePrivate"
     */
    public function afficherProprietePrivate() {
        echo $this->proprietePrivate;
    }

    /**
     * Fonction abstraite : ici le comportement de la fonction n'est pas défini
     * En faisant celà on oblige pour pouvour utiliser la classe ClasseDeBase à l'étendre et à définir cette fonction
     * @return int
     */
    abstract public function obtenir_increment();
}

/**
 * Class ClasseEntendueIncrement1
 * Une classe étendant la classe ClasseDeBase
 * Elle "hérite" du comportement de ClasseDeBase, mais on peut ajouter de nouvelles méthodes ou encore surcharger les
 * méthodes de la classe parente
 * Attention, lorsqu'on surcharge une méthode, sa définition (ie le nombre et le type des paramètres) doit être le même
 * que dans la classe parente
 */
class ClasseEntendueIncrement1 extends ClasseDeBase
{
    /**
     * Ici on définit vraiment ce que fait la fonction obtenir_increment, elle retourne 1
     * @return int
     */
    public function obtenir_increment()
    {
        // $this->proprietePrivate = 1; ERREUR => la propriété n'est accessible que dans ClasseDeBase
        // $this->proprieteProtected = 1; OK
        // $this->proprietePublic = 1; OK
        return 1;
    }
}

/**
 * Class ClasseEntendueIncrement2
 * Idem que ClasseEntendueIncrement1 sauf que l'increment vaut ici 2
 */
class ClasseEntendueIncrement2 extends ClasseDeBase
{
    /**
     * Ici on définit vraiment ce que fait la fonction obtenir_increment, elle retourne 2
     * @return int
     */
    public function obtenir_increment()
    {
        return 2;
    }
}


// $a = new ClasseDeBase(0, 0);
// => ERREUR ! On ne peut pas instancier de classe abstraite

$b = new ClasseEntendueIncrement1(0, 0);
echo 'ClasseEntendueIncrement1<br/>Valeur avant increment : ';
$b->afficherProprietePrivate();
$b->incrementer();
echo '<br/>Valeur après increment : ';
$b->afficherProprietePrivate();
echo '<br/><hr/><br/>';


$c = new ClasseEntendueIncrement2(0, 0);
echo 'ClasseEntendueIncrement2<br/>Valeur avant increment : ';
$c->afficherProprietePrivate();
$c->incrementer();
echo '<br/>Valeur après increment : ';
$c->afficherProprietePrivate();
echo '<br/>';
