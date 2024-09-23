<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\MostRecent;

class MostRecentTest extends TestCase
{
    // Тест на стандартный ввод
    public function testMostRecentWithRegularInput(): void
    {
        $result = MostRecent::mostRecent(text: '123 123 123 qq qq qq qq');
        $this->assertEquals('qq', $result);
    }

    // Тест на ввод с одним словом
    public function testMostRecentWithSingleWord(): void
    {
        $result = MostRecent::mostRecent(text: 'hello');
        $this->assertEquals('hello', $result);
    }

    // Тест на ввод с пустой строкой
    public function testMostRecentWithEmptyString(): void
    {
        $result = MostRecent::mostRecent(text: '');
        $this->assertEquals('', $result);
    }

    // Тест на ввод с одинаковым количеством разных слов
    public function testMostRecentWithEqualWordFrequency(): void
    {
        $result = MostRecent::mostRecent(text: 'apple orange apple orange');
        $this->assertEquals('apple orange', $result);
    }

    // Тест на ввод с пробелами
    public function testMostRecentWithSpaces(): void
    {
        $result = MostRecent::mostRecent(text: '  apple  banana  apple ');
        $this->assertEquals('apple', $result);
    }
}
