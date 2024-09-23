<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\ArrayUnique;

class ArrayUniqueTest extends TestCase
{
    public function testArrayWithDuplicates(): void
    {
        $result = ArrayUnique::ArrayUnique(lst: [123, 123, 123, 22, 23, 24]);
        $this->assertEquals([123, 22, 23, 24], $result);
    }

    public function testArrayWithoutDuplicates(): void
    {
        $result = ArrayUnique::ArrayUnique(lst: [1, 2, 3, 4, 5]);
        $this->assertEquals([1, 2, 3, 4, 5], $result);
    }

    public function testEmptyArray(): void
    {
        $result = ArrayUnique::ArrayUnique(lst: []);
        $this->assertEquals([], $result);
    }

    public function testArrayWithAllSameElements(): void
    {
        $result = ArrayUnique::ArrayUnique(lst: [5, 5, 5, 5, 5]);
        $this->assertEquals([5], $result);
    }

    public function testArrayWithMixedTypes(): void
    {
        $result = ArrayUnique::ArrayUnique(lst: [1, '1', 1, '1', true, false, true]);
        $this->assertEquals([1, false], $result);
    }
}
