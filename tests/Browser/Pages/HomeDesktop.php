<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class HomeDesktop extends BasePage
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
        $browser->resize(1920, 1020);
        $browser->assertSeeLink('Home');
        $browser->assertSeeLink('Our Cars');
        $browser->assertSeeLink('How it Works');
        $browser->assertSeeLink('Contact Us');
        $browser->assertSeeLink('Sign In');
        $browser->clickLink('Sign In');
        $browser->pause(500);
        $browser->assertSee('Sign in to your account');
        $browser->assertSee('Please provide your login credentials');
        $browser->assertSee('LOGIN');
        $browser->assertSeeLink('Signup!');
        $browser->assertSeeLink('Facebook');
        $browser->assertSeeLink('Google');

        $browser->keys('#login-form form input[name=email]', $email);
        $browser->assertValue('#login-form form input[name=email]', $email);
        $browser->keys('#login-form form input[name=password]', 'helloveronica');
        $browser->assertValue('#login-form form input[name=password]', 'helloveronica');
        $browser->click('#login-btn');
        $browser->pause(500);
        $browser->assertVisible('#login-err-msg');
        $browser->assertSee('Don\'t Have An Account Yet ?');
        $browser->clickLink('Signup!');

        $browser->pause(500);

        $browser->assertSee('Create An Account');
        $browser->assertSee('Please fill in below form to create an account with us');
        $browser->assertSee('SIGNUP');
        $browser->assertSeeLink('Back To Login');
        $browser->keys('#signup-form form input[name=email]', $email);
        $browser->assertValue('#signup-form form input[name=email]', $email);
        $browser->keys('#signup-form form input[name=first_name]', 'Veronica');
        $browser->assertValue('#signup-form form input[name=first_name]', 'Veronica');
        $browser->keys('#signup-form form input[name=last_name]', 'Ong');
        $browser->assertValue('#signup-form form input[name=last_name]', 'Ong');
        $browser->keys('#signup-form form input[name=password]', 'helloveronica');
        $browser->assertValue('#signup-form form input[name=password]', 'helloveronica');
        $browser->keys('#signup-form form input[name=password_confirmation]', 'nothelloveronica');
        $browser->assertValue('#signup-form form input[name=password_confirmation]', 'nothelloveronica');
        $browser->click('#sign-up-btn');
        $browser->assertVisible('#sign-up-err-msg');

        $browser->clear('password_confirmation');
        $browser->click('#sign-up-btn');
        $browser->waitForText('Sign up successful!', 10);
        $browser->click('.close');
        $browser->waitUntilMissing('#sign-up-success');
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
