<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // 1. Visit the home page

        // 2. Press a "click me" link
        // 3. See "You've been clicked"
        // 4. Asser that the current url is /feedback
        $this->visit('/')->click('click me')->seePageIs('/feedback');


    }
}
