<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;

class QuoteUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testThatQuotesListExistsInJson()
    {
        $jsonString = file_get_contents('database/seeders/KanyeQuotes.json');
        $generalQuotes = json_decode($jsonString, true);

        $this->assertIsArray($generalQuotes);
    }
}
