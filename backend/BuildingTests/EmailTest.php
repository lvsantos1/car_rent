<?php

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{

    /**
     * @covers \App\ValueObjects\Email
     * @dataProvider validEmails
     */
    public function testCanBeCreatedFromValidEmailAddress($email)
    {}
}