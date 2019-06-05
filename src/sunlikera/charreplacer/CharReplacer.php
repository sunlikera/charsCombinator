<?php

namespace sunlikera\charreplacer;

use Generator;
use sunlikera\charreplacer\dictionaries\DictionaryFactory;
use sunlikera\charreplacer\dictionaries\DictionaryInterface;

class CharReplacer
{
    /**
     * @var array
     */
    private $words;

    /**
     * @var DictionaryInterface
     */
    private $dictionary;

    /**
     * CharReplacer constructor.
     * @param array $words
     * @param string $dictionary
     */
    public function __construct(array $words, string $dictionary = DictionaryFactory::DICTIONARY_RU_TYPE)
    {
        //TODO: fix when $words like this ("word anotherWord"). Create individual service class for this things.
        $this->words = $words;
        $this->dictionary = DictionaryFactory::getDictionary($dictionary);
    }

    /**
     * Method returns generator.
     * @return Generator
     */
    public function wordsGenerator() :Generator
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
     * Method returns array with combinated words.
     * @return array
     */
    public function getWords() :array
    {
        $result = [];

        foreach ($this->wordsGenerator() as $word) {
            array_push($result, $word);
        }

        return $result;
    }

    /**
     * Method returns all kinds of possible variants combination russian and english chars.
     * 0 - main char
     * 1 - target char
     *
     * In example ("Cтаpт") 10010 - first and prelast chars are target, couse it's russian word, but target symbols is english.
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
     * Method returns string with replaced chars accrossing by combination.
     * @param array $chars
     * @param string $combination
     * @return string
     */
    private function getTransformedWord(array $chars, string $combination) : string
    {
        $result = '';
        if (empty($chars) || empty($combination)) {
            return $result;
        }

        $combination = preg_replace( '/[^0-9]/', '', $combination);
        $splitedCombination = str_split($combination);

        if (count($splitedCombination) != count($chars)) {
            return '';
        }

        for ($i = 0; $i < count($splitedCombination); $i++) {
            $charToResult = $chars[$i];
            $isTargetWord = $splitedCombination[$i];

            if ($isTargetWord) {
                $charToResult = $this->dictionary->getReplacedChar($charToResult);
            }

            $result .= $charToResult;
        }

        return $result;
    }
}
