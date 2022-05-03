<?php

use App\ValueObjects\BRL\BRL;
use App\ValueObjects\InvalidValueException;
use PHPUnit\Framework\TestCase;

class BRLTest extends TestCase {

    /**
     * @covers \App\ValueObjects\BRL\BRL
     * @dataProvider providerTestConstructorSuccess
     */

    public function testConstructorSuccess($value, $formated, $floated) {
        $brl = new BRL($value);
        $this->assertEquals($formated, (string)$brl);
        $this->assertEquals($floated, $brl->toFloat());
    }

    public function providerTestConstructorSuccess() {
        return [
            [0, 'R$0,00', 0.0],
            [0.2, 'R$0,20', 0.2],
            ['100,00', 'R$100,00', 100.0],
            [0, 'R$0,00', 0.0],
            [0.02, 'R$0,02', 0.02],
            ['100,00', 'R$100,00', 100.0],
            ['1912381238,01', 'R$1.912.381.238,01', 1912381238.01],
            ['9999999', 'R$9.999.999,00', 9999999.0],
            ['9.999.999', 'R$9.999.999,00', 9999999.0],
        ];
    }

    /**
     * @covers \App\ValueObjects\BRL\BRL
     * @dataProvider providerTestConstructorExceptions
     */
    public function testConstructorExceptions($value, $exception) {
        $this->expectException($exception);
        new BRL($value);
    }

    public function providerTestConstructorExceptions() {
        return [
            [null, TypeError::class],
            [new stdClass(), TypeError::class],
            ['true', InvalidValueException::class],
            ['', InvalidValueException::class],
            ['a', InvalidValueException::class],
            ['1.1.1', InvalidValueException::class],
            ['123,000', InvalidValueException::class],
            ['000,h', InvalidValueException::class],
            ['11.10.000', InvalidValueException::class],
            ['0,12000', InvalidValueException::class],
        ];
    }
}