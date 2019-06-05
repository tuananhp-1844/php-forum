<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends DuskTestCase
{

    use DatabaseTransactions;
    /**
     * A Dusk test example.
     *
     * @return void
     * @group register
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('first_name', 'Phạm Tuấn')
                ->type('last_name', 'Anh')
                ->type('email', 'phamtuananh760@gmail.com')
                ->type('password', '123456')
                ->type('password_confirmation', '123456')
                ->screenshot('register')
                ->press('register')
                ->assertPathIs('/profile/edit');
        });
    }
}
