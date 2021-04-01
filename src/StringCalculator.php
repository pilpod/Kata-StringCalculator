<?php 

namespace App;

class StringCalculator {

    public array $numbList;

    public function Add(string $number): int
    {
        if(!$number) {
            return 0;
        }

        $regex = '/[\s,\;\/]+/';

        $this->numbList = preg_split($regex, $number);

        $sum = array_sum($this->numbList);

        return $sum;
    }

}

?>