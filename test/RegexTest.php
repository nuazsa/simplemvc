<?php

namespace Nuazsa\Simplemvc;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{
    public function testRegex()
    {
        $path = '/product/12345/category/abcde';

        $pattern = '#^/product/([0-9a-zA-Z]*)/category/([0-9a-zA-Z]*)$#';

        Assert::assertEquals(1, preg_match($pattern, $path, $variable));

        array_shift($variable);
        var_dump($variable);
    }
}