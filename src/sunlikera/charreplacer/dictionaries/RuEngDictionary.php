<?php

namespace sunlikera\charreplacer\dictionaries;

class RuEngDictionary implements DictionaryInterface
{
    // Ключ на русском, значение на английском
    private const CHARS_MAP = [
        'О' => 'О',
        'А' => 'А',
        'Е' => 'Е',
        'Т' => 'T',
        'Р' => 'P',
        'Н' => 'H',
        'К' => 'K',
        'Х' => 'X',
        'С' => 'C',
        'В' => 'B',
        'М' => 'M',
        'о' => 'o',
        'а' => 'a',
        'е' => 'e',
        'р' => 'p',
        'к' => 'k',
        'х' => 'x',
        'с' => 'c',
    ];

    /**
     * @param string $charToReplace
     * @return string
     */
    public static function getReplacedChar(string $charToReplace)
    {
        return isset(self::CHARS_MAP[$charToReplace]) ? self::CHARS_MAP[$charToReplace] : $charToReplace ;
    }
}