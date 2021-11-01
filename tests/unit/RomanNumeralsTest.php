<?php


use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{

    private RomanNumerals $romanNumeralClass;

    public function setUp(): void
    {
       $this->romanNumeralClass = new RomanNumerals();
    }

    public function testEmptyInput() {
        $result = $this->romanNumeralClass->covertRomanNumeral('');
        $this->assertEquals("\e[0;31mNo input detected\e[0m\n", $result);
    }

    public function testNullRomanNumeral() {
        $result = $this->romanNumeralClass->covertRomanNumeral('N');
        $this->assertEquals("0\n", $result);
    }

    public function testNonRomanNumeral() {
        $result = $this->romanNumeralClass->covertRomanNumeral('josh');
        $this->assertEquals("\e[0;31mInvalid roman numeral\e[0m\n", $result);
        $result = $this->romanNumeralClass->covertRomanNumeral('J05H');
        $this->assertEquals("\e[0;31mInvalid roman numeral\e[0m\n", $result);
        $result = $this->romanNumeralClass->covertRomanNumeral('09XV');
        $this->assertEquals("\e[0;31mInvalid roman numeral\e[0m\n", $result);
        $result = $this->romanNumeralClass->covertRomanNumeral('VVV');
        $this->assertEquals("\e[0;31mInvalid roman numeral\e[0m\n", $result);

    }



    public function testVariousCorrectInputs() {
        $result = $this->romanNumeralClass->covertRomanNumeral('XVI');
        $this->assertEquals(16, $result);
        $result = $this->romanNumeralClass->covertRomanNumeral('MXV');
        $this->assertEquals(1015, $result);
        $result = $this->romanNumeralClass->covertRomanNumeral('MMXXI');
        $this->assertEquals(2021, $result);
        $result = $this->romanNumeralClass->covertRomanNumeral('LXXVIII');
        $this->assertEquals(78, $result);
        $result = $this->romanNumeralClass->covertRomanNumeral('DC');
        $this->assertEquals(600, $result);

    }

}
