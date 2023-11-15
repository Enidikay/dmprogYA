<?php

function isHoliday($timestamp) {
    $jour = date("d", $timestamp);
    $mois = date("m", $timestamp);
    $annee = date("Y", $timestamp);
    $estFerie = 0;

    // Dates fériées fixes
    if ($jour == 1 && $mois == 1) $estFerie = 1; // 1er janvier
    if ($jour == 1 && $mois == 5) $estFerie = 1; // 1er mai
    if ($jour == 8 && $mois == 5) $estFerie = 1; // 8 mai
    if ($jour == 14 && $mois == 7) $estFerie = 1; // 14 juillet
    if ($jour == 15 && $mois == 8) $estFerie = 1; // 15 août
    if ($jour == 1 && $mois == 11) $estFerie = 1; // 1 novembre
    if ($jour == 11 && $mois == 11) $estFerie = 1; // 11 novembre
    if ($jour == 25 && $mois == 12) $estFerie = 1; // 25 décembre

    return $estFerie;
}

function calculerConges($dateDebut, $dateFin, $soldeConges) {
    $jourCourant = strtotime($dateDebut);
    $dateFin = strtotime($dateFin);
    $joursConges = 0;

    while ($jourCourant <= $dateFin) {
        // Vérifier si le jour est un jour ouvré (lundi à vendredi)
        $jourSemaine = date("N", $jourCourant);
        if ($jourSemaine >= 1 && $jourSemaine <= 5) {
            // Vérifier si le jour n'est pas un jour férié (sauf fêtes religieuses)
            if (!isholiday($jourCourant)) {
                $joursConges++;
            }
        }
        $jourCourant = strtotime("+1 day", $jourCourant);
    }

    // Vérifier si l'employé a assez de solde de congés
    $joursManquants = max(0, $joursConges - $soldeConges);

    if ($joursManquants > 0) {
        // L'employé n'a pas assez de solde de congés
        return "Refusé. Jours manquants : $joursManquants";
    } else {
        // L'employé a assez de solde de congés
        return "$joursConges jours de congés";
    }
}

// Test avec les dates fournies
echo "Date n°1 : 20/03/2023 à 24/03/2023 → " . calculerConges("2023-03-20", "2023-03-24", 5) . "\n";
echo "Date n°2 : 01/04/2023 à 11/04/2023 → " . calculerConges("2023-04-01", "2023-04-11", 5) . "\n";
echo "Date n°3 : 12/07/2023 à 19/07/2023 → " . calculerConges("2023-07-12", "2023-07-19", 5) . "\n";

?>
