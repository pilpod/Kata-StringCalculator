<?php 

namespace App;

class StringCalculator {

    public function Add(string $number): int
    {
        if(!$number) {
            return 0;
        }

        $regex = '/\d/';
        preg_match_all($regex, $number, $matches, PREG_PATTERN_ORDER);

        $sum = array_sum($matches[0]);

        return $sum;
    }

}

?>