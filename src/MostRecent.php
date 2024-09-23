<?php

namespace App;

class MostRecent
{
    public static function MostRecent(string $text): string
    {
        $words = array_filter(array: explode(separator: ' ', string: $text));

        if (empty($words)) {
            return '';
        }

        $wordCounts = array_count_values(array: $words);
        arsort(array: $wordCounts);

        $mostCommonWordCount = reset(array: $wordCounts);
        $mostCommonWords = array_keys(array: $wordCounts, filter_value: $mostCommonWordCount);

        return implode(separator: ' ', array: $mostCommonWords);
    }
}
