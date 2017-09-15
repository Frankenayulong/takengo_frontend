<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class HomeMobile extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/';
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
        $browser->resize(720, 1020);
        $browser->waitFor('button.c-hor-nav-toggler', 10);
        $browser->click('button.c-hor-nav-toggler');
        $browser->assertSeeLink('Home');
        $browser->assertSeeLink('Our Cars');
        $browser->assertSeeLink('How it Works');
        $browser->assertSeeLink('Contact Us');
        $browser->assertSeeLink('Sign In');
        $browser->waitForLink('Sign In', 10);
        $browser->clickLink('Sign In');
        $browser->pause(500);
        $browser->assertSee('Sign in to your account');
        $browser->assertSee('Please provide your login credentials');
        $browser->assertSee('Don\'t Have An Account Yet ?');
        $browser->assertSee('LOGIN');
        $browser->assertSeeLink('Signup!');
        $browser->assertSeeLink('Facebook');
        $browser->assertSeeLink('Google');
        $browser->assertSee('TAKE N GO');
        $browser->assertSee('SITE MAP');
        $browser->assertSee('FIND US');
        $browser->assertSee('2017 © Take N Go All Rights Reserved.');
        
        $browser->keys('#login-form form input[name=email]', $email);
        $browser->pause(500);
        $browser->assertValue('#login-form form input[name=email]', $email);
        $browser->keys('#login-form form input[name=password]', 'helloveronica');
        $browser->pause(500);
        $browser->assertValue('#login-form form input[name=password]', 'helloveronica');
        $browser->click('#login-btn');
        $browser->waitFor('#login-err-msg', 10);
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
        $browser->keys('#signup-form form input[name=password_confirmation]', 'nothelloveronica');
        $browser->pause(500);
        $browser->assertValue('#signup-form form input[name=password_confirmation]', 'nothelloveronica');
        $browser->click('#sign-up-btn');
        $browser->assertSee('Password does not match');
        $browser->clear('password_confirmation');
        $browser->keys('#signup-form form input[name=password_confirmation]', 'helloveronica');
        $browser->pause(500);
        $browser->assertValue('#signup-form form input[name=password_confirmation]', 'helloveronica');
        $browser->click('#sign-up-btn');
        $browser->waitForText('Sign up successful!', 10);
        $browser->click('#sign-up-success .close');
        $browser->waitUntilMissing('#sign-up-success');
        $browser->waitForText('VERONICA', 10);
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
