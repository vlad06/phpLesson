<?php
$date = new DateTime("2019-01-01");
$interval = new DateInterval("P1M1DT1M");
$date->add($interval);
var_dump($date);
var_dump($interval);

// $date = "2014-01-01";
// $date2 = "2019-04-01";

// $d = new DateTime($date);
// $d2 = new DateTime($date2);
// // la méthode diff renvoie un objet de type DateInterval
// $diff = $d->diff($d2, true);
// echo "Il y a {$diff->y} années, et {$diff->m} mois de différence";
// // echo "Il y a $days jours de différence";
// // (int)$entier = 12;
// // (string)$chaine = "coucou";
// // $date = new dateTime();
// // $date->modify("+1 month");
// // var_dump($date);
// // echo $date->format("d/m/Y");
// echo "\n";
// // $time = time();
// // $time = strtotime("+1 month", $time);
// // echo date("d/m/Y", $time);

// $time = strtotime($date);
// $time2 = strtotime($date2);
// $days = abs(($time - $time2) / (24 * 60 * 60));
// echo "Il y a $days jours de différence";


?>