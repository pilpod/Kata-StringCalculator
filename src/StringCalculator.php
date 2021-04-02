<?php 

namespace App;

class StringCalculator {

    public array $numbList;

    public function Add(string $number)
    {
        if(!$number) {
            return 0;
        }

        $regex = '/[\s,\;\/]+/';

        $this->numbList = preg_split($regex, $number);

        $message = $this->hasNegativeNumb($this->numbList);

        if($message) { return $message; }

        $sum = array_sum($this->numbList);

        return $sum;
    }

    public function hasNegativeNumb(array $list)
    {
        $negativesNumb = "";

        foreach ($list as $numb) {
            if($numb < 0) {
                $negativesNumb .= $numb . ';';
            }
        }

        $negativesNumb = substr($negativesNumb, 0, -1);

        if(strlen($negativesNumb) > 0) {
            return 'negatives not allowed, ' . $negativesNumb;
        }

    }

}

?>