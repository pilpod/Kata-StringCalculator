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

    public function test_stringCalculator_return_sum_using_number_separete_with_coma_or_space()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("1\n2,3");

        $this->assertEquals(6, $response);
    }

    public function test_stringCalculator_return_sum_using_number_support_different_delimiters()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("//;\n1;2");

        $this->assertEquals(3, $response);
    }

    public function test_stringCalculator_return_an_error_with_negative_numb()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("-1");

        $this->assertEquals('negatives not allowed, -1', $response);
    }

    public function test_stringCalculator_have_multiple_negative_numbers()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("-1;-5");

        $this->assertEquals('negatives not allowed, -1;-5', $response);
    }


}

?>