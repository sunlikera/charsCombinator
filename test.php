<?php

system('clear');
echo 'Start testing' . PHP_EOL;

require 'src/sunlikera/charreplacer/CharReplacer.php';

$words = [
    'ООО',
    'ОАО',
    'ЗАО',
];

$charsTranslator = new CharReplaser($words);

foreach ($charsTranslator->wordsGenerator() as $word) {
    print_r($word);
    echo PHP_EOL;
}

print_r($charsTranslator->getWords());