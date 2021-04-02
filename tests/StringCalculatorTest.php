<?php 

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\StringCalculator;

class StringCalculatorTest extends TestCase
{
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

    public function test_how_many_Add_is_invoked()
    {
        $stringCalcul = new StringCalculator();

        $stringCalcul->Add('1');
        $stringCalcul->Add('3');
        $stringCalcul->Add('14');

        $response = $stringCalcul->GetCalledCount();

        $this->assertEquals('Method Add() called 3 times', $response);
    }

    public function test_number_bigger_than_1000_should_be_ignored()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("2;1001;5;2000");

        $this->assertEquals(7, $response);
    }

    public function test_Delimiters_can_be_of_any_length()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("//[***]\n1***2***3");

        $this->assertEquals(6, $response);
    }

    public function test_allow_multiple_delimiters()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("//[*][%]\n1*2%3");

        $this->assertEquals(6, $response);
    }


    public function test_handle_multiple_delimiters_with_length_longer_than_one()
    {
        $stringCalcul = new StringCalculator();

        $response = $stringCalcul->Add("//[*][%]\n1*2%3");

        $this->assertEquals(6, $response);
    }
}

?>