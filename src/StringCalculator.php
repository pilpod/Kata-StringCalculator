<?php 

namespace App;

class StringCalculator {

    public array $numbList;

    public function Add(string $number)
    {
        if(!$number) {
            return 0;
        }

        $message = $this->isNegativeNumb($number);

        if($message) {
            return $message;
        }

        $regex = '/[\s,\;\/]+/';

        $this->numbList = preg_split($regex, $number);

        $sum = array_sum($this->numbList);

        return $sum;
    }

    public function isNegativeNumb(string $numb)
    {
        if($numb < 0) {
            return 'negatives not allowed, ' . $numb;
        }
    }

}

?>