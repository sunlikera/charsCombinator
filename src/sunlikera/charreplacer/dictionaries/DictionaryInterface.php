<?php

namespace sunlikera\charreplacer\dictionaries;

interface DictionaryInterface
{
    /**
     * @param string $charToReplace
     * @return string
     */
    public function getReplacedChar(string $charToReplace);
}