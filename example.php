<?php

system('clear');
echo 'Start testing' . PHP_EOL;

require_once __DIR__ . '/src/sunlikera/charreplacer/CharReplacer.php';
require_once __DIR__ . '/src/sunlikera/charreplacer/dictionaries/DictionaryInterface.php';
require_once __DIR__ . '/src/sunlikera/charreplacer/dictionaries/BaseDictionary.php';
require_once __DIR__ . '/src/sunlikera/charreplacer/dictionaries/source/RuEngDictionary.php';
require_once __DIR__ . '/src/sunlikera/charreplacer/dictionaries/source/EngRuDictionary.php';
require_once __DIR__ . '/src/sunlikera/charreplacer/dictionaries/DictionaryFactory.php';

use sunlikera\charreplacer\CharReplacer;

$words = [
    'ООО',
    'ОАО',
    'ЗАО',
];

//$words = [
//    'cat',
//    'car',
//];

$charReplacer = new CharReplacer($words);

foreach ($charReplacer->wordsGenerator() as $word) {
    print_r($word);
    echo PHP_EOL;
}

print_r($charReplacer->getWords());