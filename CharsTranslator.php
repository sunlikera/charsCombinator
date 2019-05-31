<?php


class CharsTranslator
{
    // Мапа для соотношения символов. Ключ символ на русском языке, значение - эквивалент на английском.
    const CHARS_MAP = [
        'rus' => [
            'О' => 'O(eng)',
            'А' => 'A(eng)',
        ],
        'eng' => [
            'O' => 'О(rus)',
            'A' => 'А(rus)'
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
            $combinations = $this->getCombination();
            $chars = str_split($word);

            foreach ($combinations as $combination) {
                yield $this->getTransformedWord($chars, $combination);
            }
        }
    }

    /**
     * Метод возвращает возможные варианты комбинации русских и английских букв
     * 0 - русская буква
     * 1 - английская буква
     *
     * В примере "OАО" метод вернет 100, т.к. первая O - английская.
     */
    private function getCombination() : array
    {
        return [
            '000',
            '100',
            '010',
            '001',
            '110',
            '011',
            '111',
        ];
        //TODO: тут надо сделать так, чтобы возвращал в двоичной системе всегда трехзначное число (пример: 001)
    }

    private function getTransformedWord(array $chars, string $combination) : string
    {
        $combinationArray = str_split($combination);
        $result = '';

        for ($i = 0; $i < count($combinationArray); $i++) {
            $number = $combinationArray[$i];
            $currentChar = $chars[$i];

            $key = $this->getNumberRelation($number);

////            if (isset(self::CHARS_MAP[$key][$currentChar])) {
//                $result .= self::CHARS_MAP[$key][$currentChar];
////            }
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
