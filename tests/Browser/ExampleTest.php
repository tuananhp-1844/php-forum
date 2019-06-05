<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class ExampleTest extends DuskTestCase
{
    use DatabaseTransactions;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = factory(User::class)->create([
            'email' => 'phamtuananh760@gmail.com',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->screenshot('home-page')
                ->press('login')
                ->assertPathIs('/questions');
        });
    }
}
