<?php

namespace sunlikera\charreplacer\dictionaries;

use sunlikera\charreplacer\dictionaries\source\RuEngDictionary;
use sunlikera\charreplacer\dictionaries\source\EngRuDictionary;

class DictionaryFactory
{
    const DICTIONARY_RU_TYPE = 'ru';
    const DICTIONARY_ENG_TYPE = 'eng';

    /**
     * Method returns type of dictionary.
     * @param string $type
     * @return DictionaryInterface
     */
    public static function getDictionary($type = '') :DictionaryInterface
    {
        switch ($type) {
            case self::DICTIONARY_RU_TYPE:
                return new RuEngDictionary();

            case self::DICTIONARY_ENG_TYPE:
                return new EngRuDictionary();
        }
    }
}