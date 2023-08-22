<?php

namespace Sample;

class MySuperClass
{
    private string $text;
    public function __construct(string $text = "Hello world ! " )
    {
        $this->text = $text;
    }
    public function display() : void
    {
        echo $this->text . PHP_EOL;
    }
    public function __toString() : string
    {
        return $this->text;
    }
}
