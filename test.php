<?php

system('clear');
echo 'Start testing' . PHP_EOL;

require_once __DIR__ . '/src/sunlikera/charreplacer/CharReplacer.php';
require_once __DIR__ . '/src/sunlikera/charreplacer/dictionaries/DictionaryInterface.php';
require_once __DIR__ . '/src/sunlikera/charreplacer/dictionaries/RuEngDictionary.php';

use sunlikera\charreplacer\CharReplacer;

$words = [
    'ООО',
    'ОАО',
    'ЗАО',
];

$charReplacer = new CharReplacer($words);

foreach ($charReplacer->wordsGenerator() as $word) {
    print_r($word);
    echo PHP_EOL;
}

print_r($charReplacer->getWords());