<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public static function provider()
    {
        yield from [];
    }

    #[DataProvider('provider')]
    public function test_with_provider()
    {
        $this->assertTrue(true);
    }
}
