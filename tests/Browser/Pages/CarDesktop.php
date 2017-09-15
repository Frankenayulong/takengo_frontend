<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;
use App\User;

class CarDesktop extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/cars';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $email = str_random(20) . '@' . str_random(5) . '.' . str_random(3);

        $browser->assertPathIs($this->url());
        $browser->resize(1920, 1020);
        $browser->assertSeeLink('Home');
        $browser->assertSeeLink('Our Cars');
        $browser->assertSeeLink('How it Works');
        $browser->assertSeeLink('Contact Us');

        $browser->assertSee('OUR CARS');
        $browser->assertSee('CAR TYPES');
        $browser->assertSee('PRICE RANGE');
        $browser->assertSee('SORT BY');
        $browser->assertSee('RADIUS (10 KM)');
        $browser->assertSee('SEARCH');

        $browser->driver->executeScript('window.scrollTo(0, 1000);');
        $browser->assertSee('TAKE N GO');
        $browser->assertSee('SITE MAP');
        $browser->assertSee('FIND US');
        $browser->assertSee('2017 © Take N Go All Rights Reserved.');
        $browser->assertSee('DETAILS');
        $browser->assertSeeLink('Book Now');
        $browser->click('.book-btn');
        $browser->waitForText('Sign in to your account', 10);

        $browser->click('#login-form-signup');
        
        $browser->pause(500);

        $browser->assertSee('Create An Account');
        $browser->assertSee('Please fill in below form to create an account with us');
        $browser->assertSee('SIGNUP');
        $browser->assertSeeLink('Back To Login');
        $browser->keys('#signup-form form input[name=email]', $email);
        $browser->pause(500);
        $browser->assertValue('#signup-form form input[name=email]', $email);
        $browser->keys('#signup-form form input[name=first_name]', 'Veronica');
        $browser->pause(500);
        $browser->assertValue('#signup-form form input[name=first_name]', 'Veronica');
        $browser->keys('#signup-form form input[name=last_name]', 'Ong');
        $browser->pause(500);
        $browser->assertValue('#signup-form form input[name=last_name]', 'Ong');
        $browser->keys('#signup-form form input[name=password]', 'helloveronica');
        $browser->pause(500);
        $browser->assertValue('#signup-form form input[name=password]', 'helloveronica');
        $browser->keys('#signup-form form input[name=password_confirmation]', 'helloveronica');
        $browser->pause(500);
        $browser->assertValue('#signup-form form input[name=password_confirmation]', 'helloveronica');
        $browser->click('#sign-up-btn');
        $browser->waitForText('Sign up successful!', 10);
        $browser->click('#sign-up-success .close');
        $browser->click('.details-btn');
        $browser->waitForText('CAR DETAILS', 5);
        $browser->assertSee('BOOK NOW');
        $browser->click('#book-now');
        
        $browser->waitFor('#book-now');
        $browser->assertSee('BOOK A CAR');
        $browser->assertSee('/ day');
        $browser->assertSee('CAR TYPE');
        $browser->assertSee('TRANSITION MODE');
        $browser->assertSee('RELEASE YEAR');
        $browser->assertSee('CAPACITY');
        $browser->assertSee('LARGE BAGS');
        $browser->assertSee('DOORS');
        $browser->assertSee('SMALL BAGS');
        $browser->assertSee('AIR CONDITIONED');
        $browser->assertSee('MILEAGE');
        $browser->assertSee('FUEL POLICY');
        $browser->click('#book-now');
        $browser->waitForText('BOOKING HISTORY', 10);
        $browser->assertSee('Stop');
        $browser->click('.stop-btn');
        $browser->waitForText('Stopped');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
