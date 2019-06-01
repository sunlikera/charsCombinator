<?php

class CharsTranslator
{
    // Мапа для соотношения символов. Ключ символ на русском языке, значение - эквивалент на английском.
    const CHARS_MAP = [
        'rus' => [
            'О' => 'O',
            'А' => 'A',
        ],
        'eng' => [
            'O' => 'О',
            'A' => 'А'
        ],
    ];

    private $words;

    public function __construct($words)
    {
        $this->words = $words;
    }

    /**
     * @return \Generator
     */
    public function getWord()
    {
        foreach ($this->words as $word) {
            $combinations = $this->getCombination($word);

            print_r($combinations);
//            $chars = str_split($word);
//
//            foreach ($combinations as $combination) {
//                yield $this->getTransformedWord($chars, $combination);
//            }
        }
    }

    /**
     * Метод возвращает возможные варианты комбинации русских и английских букв
     * 0 - русская буква
     * 1 - английская буква
     *
     * В примере "OАО" метод вернет 100, т.к. первая O - английская.
     *
     * @param string $word
     * @return array
     */
    private function getCombination(string $word) : array
    {
        $wordLenght = mb_strlen($word);
        $cyrleLength = pow(2, $wordLenght);
        $format = "%'.0" . $wordLenght . "b\n";

        $result = [];

        for ($i = 0; $i < $cyrleLength; $i++) {
            array_push($result, sprintf($format, $i));
        }

        return $result;
    }

    private function getTransformedWord(array $chars, string $combination) : string
    {
        $combinationArray = str_split($combination);
        $result = '';

        print_r($combinationArray);
        echo PHP_EOL;

        for ($i = 0; $i < count($combinationArray); $i++) {
            $number = $combinationArray[$i];
            $currentChar = $chars[$i];

            $key = $this->getNumberRelation($number);

//            if (isset(self::CHARS_MAP[$key][$currentChar])) {
                $result .= self::CHARS_MAP[$key][$currentChar];
//            }
        }

        return $result;
    }

    /**
     * @param $num
     * @return string
     */
    private function getNumberRelation($num)
    {
        return ($num == 0) ? 'rus' : 'eng';
    }
}
