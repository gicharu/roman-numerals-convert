<?php

class RomanNumerals
{

    private array $romanNumeralsMap = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    private string $romanNumeralsRegex = '/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/';

    /**
     * @param $number
     * @return bool
     */
    private function ValidateRomanNumber($number) : bool {
        return preg_match($this->romanNumeralsRegex, $number) > 0;
    }

    /**
     * @param $number
     * @return int|string
     */
    public function covertRomanNumeral ($number) {
        $result = 0;
        $emptyInput = false;
        $nullInput = false;
        $number = strtoupper($number);
        if(empty($number)) {
            $emptyInput = true;
            $result = "\e[0;31mNo input detected\e[0m\n";
        }
        if ($number == 'N') {
            $nullInput = true;
            $result = 0 . "\n";
        }


        
        //validate string
        $validNumeral = $this->validateRomanNumber($number);
        if(false === $emptyInput && false === $nullInput) {
            if (false === $validNumeral) {
                $result = "\e[0;31mInvalid roman numeral\e[0m\n";
            } else {
                for ($i = 0, $length = strlen($number); $i < $length; $i++) {
                    //get the value of current char
                    $value = $this->romanNumeralsMap[$number[$i]];
                    //get the value of next char - null if there is no next char
                    $nextVal = !isset($number[$i + 1]) ? null : $this->romanNumeralsMap[$number[$i + 1]];
                    //adding/subtracting value from result based on $nextval
                    $result += (!is_null($nextVal) && $nextVal > $value) ? -$value : $value;
                }
            }
        }
        return $result;
    }

    /**
     * @return int|string
     * @codeCoverageIgnore
     */
    public function init() {
        $prompt = "Enter roman numeral:\n";
        $number = readline($prompt);
        return $this->covertRomanNumeral($number);

    }


}

