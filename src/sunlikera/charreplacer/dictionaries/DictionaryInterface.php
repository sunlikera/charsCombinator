<?php

namespace sunlikera\charreplacer\dictionaries;

interface DictionaryInterface
{
    /**
     * @param string $charToReplace
     * @return string|bool
     */
    public function getReplacedChar(string $charToReplace);
}