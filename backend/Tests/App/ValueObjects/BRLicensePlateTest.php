<?php

namespace App\ValueObjects;

use App\ValueObjects\BRLicensePlate\BRLicensePlate;
use PHPUnit\Framework\TestCase;

class BRLicensePlateTest extends TestCase {

    /**
     * @covers \App\ValueObjects\BRLicensePlate
     * @dataProvider validLicensePlateProvider
     */
    public function testConstructor($licensePlate, $formated) {
        $licensePlate = new BRLicensePlate($licensePlate);
        $this->assertEquals($formated, (string)$licensePlate);
    }

    public function validLicensePlateProvider(){
        return [
            ['ABC-1234', 'ABC-1234'],
            ['ABC1234' , 'ABC-1234'],
            ['HSH7575' , 'HSH-7575'],
            ['PIR0000' , 'PIR-0000'],
        ];
    }

}