<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuoteFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApiReturnsQuotes()
    {
        $response = $this->get(route('quotes'));

        $response->assertResponseStatus(200)
            ->seeJson([
                'status' => true
            ]);;
    }

    public function testQuotePageWorks()
    {
        $this->visit(route('home'))
                ->see('Kanye Quotes');
    }

}
