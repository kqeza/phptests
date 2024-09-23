<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Cipher;

class CipherTest extends TestCase
{
    // Тест шифрования русского текста с положительным ключом
    public function testCipherWithRussianTextAndPositiveKey(): void
    {
        $result = Cipher::cipher(text: 'абвгд', key: 1);
        $this->assertEquals('бвгде', $result);
    }

    // Тест шифрования английского текста с положительным ключом
    public function testCipherWithEnglishTextAndPositiveKey(): void
    {
        $result = Cipher::cipher(text: 'abcde', key: 2);
        $this->assertEquals('cdefg', $result);
    }

    // Тест шифрования с ключом, превышающим длину алфавита
    public function testCipherWithKeyGreaterThanAlphabetLength(): void
    {
        $result = Cipher::cipher(text: 'абвгд', key: 33); //
        $this->assertEquals('бвгде', $result);
    }

    // Тест шифрования текста с неалфавитными символами
    public function testCipherWithNonAlphabetCharacters(): void
    {
        $result = Cipher::cipher(text: 'абвгд123', key: 1);
        $this->assertEquals('бвгде123', $result);
    }

    // Тест шифрования текста с отрицательным ключом
    public function testCipherWithNegativeKey(): void
    {
        $result = Cipher::cipher(text: 'бвгде', key: -1);
        $this->assertEquals('абвгд', $result);
    }
}

