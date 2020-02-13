<?php

// Changement de locale pour être en français
if (!setlocale(LC_TIME, 'fr_FR.utf8', 'fr_FR', 'fr'))
    throw new Exception ('Français introuvable : corriger ou commenter cette ligne (pour la langue par défaut)');

/**
 * Fonction de calcul de date.
 *
 * @param string $ancre date de départ (ancrage de départ)
 * @param integer $cycle n° de cycle (premier cycle = 0)
 * @param string $semaine nom de la semaine (de 'A' à 'D')
 * @param integer $jour n° du jour (de 1 à 7)
 * @return object
 */


//
// QUELQUES TESTS
//

// Jour de départ (ancre) :
// format = YYYY-MM-DD
// Attention : cela doit être un lundi !
$ancre = '2020-01-20';

// Tests unitaires
echo 'Test auj.' . print_r(calc_date($ancre, 'A', 1, 0)) . '<br/>';
echo 'Test auj.' . calc_date($ancre, 'A', 1, 0)->jour_nom . '<br/>';
echo 'Test lundi proch' . print_r(calc_date($ancre, 'B', 1, 0)) . '<br/>';
echo 'Test début pr. cycle' .  print_r(calc_date($ancre, 'A', 1, 1)) . '<br/>';

?>
