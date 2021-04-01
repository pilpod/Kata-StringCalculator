<?php 

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\StringCalculator;

class StringCalculatorTest extends TestCase {

    public function test_stringCalculator_return_zero()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("");

        $this->assertEquals(0, $response);
    }

    public function test_stringCalculator_return_one()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("1");

        $this->assertEquals(1, $response);
    }

    public function test_stringCalculator_return_sum_of_one_and_two()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("1,2");

        $this->assertEquals(3, $response);
    }

    public function test_stringCalculator_return_sum_using_number_with_two_digit()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("1,2,5,10,55,100");

        $this->assertEquals(173, $response);
    }


}

?>