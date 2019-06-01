<?php

namespace sunlikera\charreplacer\dictionaries;

interface DictionaryInterface
{
    /**
     * Возвращает аналог символу. Если аналога нет, возвращает сам символ.
     * @param string $charToReplace
     * @return string
     */
    public static function getReplacedChar(string $charToReplace);
}