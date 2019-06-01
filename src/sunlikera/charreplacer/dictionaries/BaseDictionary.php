<?php

namespace sunlikera\charreplacer\dictionaries;

abstract class BaseDictionary implements DictionaryInterface
{
    private const CHARS_MAP = [];

    /**
     * @param string $charToReplace
     * @return string
     */
    public function getReplacedChar(string $charToReplace) :string
    {
        return isset(self::CHARS_MAP[$charToReplace]) ? self::CHARS_MAP[$charToReplace] : $charToReplace ;
    }
}