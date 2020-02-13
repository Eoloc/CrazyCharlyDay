<?php



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
