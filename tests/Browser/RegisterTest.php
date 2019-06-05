<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->pause(1000)
                ->type('first_name', 'Phạm Tuấn')
                ->type('last_name', 'Anh')
                ->type('email', 'phamtuananh11211@gmail.com')
                ->type('password', '123456')
                ->type('password_confirmation', '123456')
                ->screenshot('register')
                ->press('register')
                ->assertPathIs('/profile/edit');
        });
    }
}
