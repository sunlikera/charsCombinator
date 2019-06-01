<?php

system('clear');
echo 'Start testing' . PHP_EOL;

require 'CharsTranslator.php';

$words = [
    'ООО',
    'ОАО',
    'ЗАО',
];

$charsTranslator = new CharsTranslator($words);

foreach ($charsTranslator->wordsGenerator() as $word) {
    print_r($word);
    echo PHP_EOL;
}

print_r($charsTranslator->getWords());