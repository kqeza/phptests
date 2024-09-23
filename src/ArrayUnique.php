<?php

namespace App;

class ArrayUnique
{
    public static function ArrayUnique(array $lst): array
    {
        return array_values(array: array_unique(array: $lst));
    }
}
