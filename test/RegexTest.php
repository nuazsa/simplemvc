<?php

namespace Nuazsa\Simplemvc;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

/**
 * Class RegexTest
 * 
 * A PHPUnit test class to test regular expressions for route matching.
 */
class RegexTest extends TestCase
{
    /**
     * Test method for regex pattern matching on a given path.
     * 
     * This method tests if a given path matches the specified regex pattern,
     * and extracts the dynamic parts of the path.
     * 
     * @return void
     */
    public function testRegex()
    {
        // The path to test against the regex pattern
        $path = '/product/12345/category/abcde';

        // The regex pattern to match the path
        $pattern = '#^/product/([0-9a-zA-Z]*)/category/([0-9a-zA-Z]*)$#';

        // Assert that the path matches the regex pattern
        Assert::assertEquals(1, preg_match($pattern, $path, $variable));

        // Remove the full match from the results
        array_shift($variable);

        // Output the captured groups for debugging
        var_dump($variable);
    }
}
