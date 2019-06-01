<?php

namespace sunlikera\charreplacer;

class CharReplaser
{
    // Мапа для соотношения символов. Ключ символ на русском языке, значение - эквивалент на английском.
    const CHARS_MAP = [
        'О' => 'О',
        'А' => 'А'
    ];

    private $words;

    public function __construct($words)
    {
        $this->words = $words;
    }

    /**
     * Генератор, который возвращает комбинацию слов.
     * @return Generator
     */
    public function wordsGenerator()
    {
        foreach ($this->words as $word) {
            $combinations = $this->getCombination($word);
            $chars = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);

            foreach ($combinations as $combination) {
                yield $this->getTransformedWord($chars, $combination);
            }
        }
    }

    /**
     * Метод, который возвращает комбинацию слов.
     * @return array
     */
    public function getWords()
    {
        $result = [];

        foreach ($this->wordsGenerator() as $word) {
            array_push($result, $word);
        }

        return $result;
    }

    /**
     * Метод возвращает возможные варианты комбинации русских и английских букв
     * 0 - русская буква
     * 1 - английская буква
     *
     * В примере 10010 - первый и предпоследний символ английский.
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

    /**
     * Метод возвращет строку с замененными символами согласно комбинации.
     * @param array $chars
     * @param string $combination
     * @return string
     */
    private function getTransformedWord(array $chars, string $combination) : string
    {
        $result = '';
        //очищаем от спецсимволов
        $combination = preg_replace( '/[^0-9]/', '', $combination);
        $splitedCombination = str_split($combination);

        for ($i = 0; $i < count($splitedCombination); $i++) {
            $charToResult = $chars[$i];
            $isTargetWord = $splitedCombination[$i];

            if ($isTargetWord) {
                $charToResult = (self::CHARS_MAP[$charToResult]) ?? $charToResult;
            }

            $result .= $charToResult;
        }

        return $result;
    }
}