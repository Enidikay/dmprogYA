<?php

// Définir une interface nommée Presentation avec une méthode sePresenter()
interface Presentation {
    public function sePresenter();
}

// Créer une classe abstraite Personne implémentant l'interface Presentation
abstract class Personne implements Presentation {
    // Déclarer des propriétés protégées pour stocker le prénom et l'âge d'une personne
    protected $Prenom;
    protected $Age;

    // Constructeur pour initialiser les propriétés avec les valeurs fournies
    public function __construct($_prenom, $_age) {
        $this->Prenom = $_prenom;
        $this->Age = $_age;
    }
}

// Créer une classe concrète Homme qui étend la classe abstraite Personne
class Homme extends Personne {
    // Implémenter la méthode sePresenter pour afficher des informations sur un homme
    public function sePresenter() {
        echo "Je suis un Homme de " . $this->Age . " ans et je m'appelle " . $this->Prenom . "\n";
    }
}

// Créer une classe concrète Femme qui étend la classe abstraite Personne
class Femme extends Personne {
    // Implémenter la méthode sePresenter pour afficher des informations sur une femme
    public function sePresenter() {
        echo "Je suis une Femme de " . $this->Age . " ans et je m'appelle " . $this->Prenom . "\n";
    }
}

// Créer des instances des classes Femme et Homme
$femme = new Femme('Karine', 30);
$homme = new Homme('Karim', 25);

// Appeler la méthode sePresenter sur les objets Homme et Femme pour afficher leurs informations
$homme->sePresenter();
$femme->sePresenter();

?>