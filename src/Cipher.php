<?php

namespace App;

class Cipher
{
    public static function cipher(string $text, int $key): string
    {
        $russianAlphabet = 'абвгдежзийклмнопрстуфхцчшщъыьэюя';
        $russianAlphabetArray = preg_split(pattern: '//u', subject: $russianAlphabet, limit: -1, flags: PREG_SPLIT_NO_EMPTY);

        $englishAlphabet = range(start: 'a', end: 'z');

        $textChars = preg_split(pattern: '//u', subject: $text, limit: -1, flags: PREG_SPLIT_NO_EMPTY);

        $result = '';
        foreach ($textChars as $symbol) {
            $currentAlphabet = $englishAlphabet;
            if (in_array(needle: $symbol, haystack: $russianAlphabetArray)) {
                $currentAlphabet = $russianAlphabetArray;
            }
            if (in_array(needle: $symbol, haystack: $currentAlphabet)) {
                $currentIndex = array_search(needle: $symbol, haystack: $currentAlphabet);
                $newIndex = ($currentIndex + $key) % count(value: $currentAlphabet);
                if ($newIndex < 0) {
                    $newIndex += count(value: $currentAlphabet);
                }
                $result .= $currentAlphabet[$newIndex];
            } else {
                $result .= $symbol;
            }
        }
        return $result;
    }
}
