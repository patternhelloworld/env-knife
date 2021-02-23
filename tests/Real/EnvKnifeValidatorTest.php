<?php

namespace Arwg\EnvKnife\Tests\Real;

use Arwg\EnvKnife\EnvKnife;
use PHPUnit\Framework\TestCase;


class EnvKnifeValidatorTest extends TestCase
{

    public function testKnife()
    {
        $envKnife = new EnvKnife();

        $envKnife->parseResults('config', null, ['tests']);

        $results = $envKnife->getEmptyResults();


    }


}
