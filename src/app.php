<?php 

use App\StringCalculator;

$stringCal = new StringCalculator;

$result = $stringCal->Add("1,2,5,10,55,100");

var_dump($result);

?>