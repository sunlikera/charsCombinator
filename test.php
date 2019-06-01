<?php

system('clear');
echo 'Start testing' . PHP_EOL;

require 'CharsTranslator.php';

$words = [
    'ООО',
    'ОАОО',
    'ЗАООО',
];

$charsTranslator = new CharsTranslator($words);

foreach ($charsTranslator->getWord() as $word) {
    print_r($word);
    echo PHP_EOL;
}