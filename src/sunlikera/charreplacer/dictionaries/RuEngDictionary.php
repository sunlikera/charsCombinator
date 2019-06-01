<?php

namespace sunlikera\charreplacer\dictionaries;

class RuEngDictionary implements DictionaryInterface
{
    // Ключ на русском, значение на английском
    const CHARS_MAP = [
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
    ];

    /**
     * @param string $charToReplace
     * @return string|bool
     */
    public function getReplacedChar(string $charToReplace)
    {
        return isset(self::CHARS_MAP[$charToReplace]) ? self::CHARS_MAP[$charToReplace] : false ;
    }
}