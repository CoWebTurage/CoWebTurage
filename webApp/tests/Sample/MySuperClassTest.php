<?php

namespace Sample;

use PHPUnit\Framework\TestCase;

class MySuperClassTest extends TestCase
{
    public function testToString()
    {
        $noString = new MySuperClass();
        $this->assertEquals("Hello world ! ", $noString);
        $sampleString = "This is a sample string";
        $sample = new MySuperClass($sampleString);
        $this->assertEquals($sampleString, $sample);
    }
}
