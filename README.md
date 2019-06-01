###### Char replacer

This library returns combination all words with all kinds of similar english chars.

For examle:
in word "Хай" char "Х" can be "X" in english and char "а" can be similar char "a" in english.

You can initialize CharReplacer and get all combinations:

```php
$charReplacer = new CharReplacer(['Хай', 'Привет']);
$allKindsOfCombination = $charReplacer->getWords();
```

Or you can use this in cycle:

```php
$charReplacer = new CharReplacer(['Хай', 'Привет']);
foreach ($charReplacer->wordsGenerator() as $word) {
    //do smt with $word
}
```
