<?php


namespace Arwg\EnvKnife\Parser;

use Arwg\EnvKnife\EnvRegex;

abstract class AbstractParser
{
    protected $envRegex;

    public function __construct(EnvRegex $envRegex)
    {
        $this->envRegex = $envRegex;
    }

    abstract public function parse(string $text);

}