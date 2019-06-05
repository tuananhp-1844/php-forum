<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\User;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'phamtuananh@laravel.com')
                ->type('password', 'password')
                ->pause('1000')
                ->screenshot('home-page')
                ->press('login')
                ->assertPathIs('/questions');
        });
    }
}
