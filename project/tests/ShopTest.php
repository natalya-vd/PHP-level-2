<?php

use PHPUnit\Framework\TestCase;

class ShopTest extends TestCase
{
    public function testAdd()
    {
        $x = 1;
        $y = 2;

        $this->assertEquals(3, $x + $y);
    }

    public function testSub()
    {
        $x = 10;
        $y = 2;

        $this->assertEquals(8, $x - $y);
    }
}