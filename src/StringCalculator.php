<?php 

namespace App;

class StringCalculator {

    public array $numbList;
    private int $addCount = 0;

    public function Add(string $number)
    {
        $this->addCount++;

        if(!$number) { return 0; }

        $regex = '/[\s,\;\/*]+/';

        $this->numbList = preg_split($regex, $number);

        $message = $this->hasNegativeNumb($this->numbList);

        if($message) { return $message; }

        $this->hasNumberBiggerThan1000($this->numbList);

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

    public function GetCalledCount(): string
    {
        $message = "Method Add() called {$this->addCount} times";

        return $message;
    }

    public function hasNumberBiggerThan1000(array $list): void
    {
        $validNumblist = array();

        foreach ($list as $numb) {
            if($numb < 1000) {
                array_push($validNumblist, $numb);
            }
        }

        $this->numbList = $validNumblist;
    }

}

?>