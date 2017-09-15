<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;

class ContactUs extends BasePage
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/contact-us';
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

        $browser->assertSee('SUBSCRIBE TO OUR NEWSLETTER');
        $browser->assertSee('KEEP IN TOUCH');

        $browser->assertVisible('#contact-email');
        $browser->assertVisible('#contact-phone');
        $browser->assertVisible('#contact-name');
        $browser->assertVisible('#contact-content');
        $browser->driver->executeScript('window.scrollTo(0, 350);');
        $browser->keys('#contact-name', 'Veronica Ong');
        $browser->pause(500);
        $browser->assertValue('#contact-name', 'Veronica Ong');
        $browser->keys('#contact-email', 'verong@gmail.com');
        $browser->pause(500);
        $browser->assertValue('#contact-email', 'verong@gmail.com');
        $browser->keys('#contact-phone', '1');
        $browser->pause(500);
        $browser->assertValue('#contact-phone', '1');
        $browser->keys('#contact-content', 'Hi There');
        $browser->pause(500);
        $browser->assertValue('#contact-content', 'Hi There');
        $browser->keys('#contact-phone', ['{backspace}'], '0416842836');
        $browser->assertVisible('#contact-submit-btn');
        $browser->click('#contact-submit-btn');
        $browser->waitForText('Your query has been received!');

        $browser->assertVisible('#newsletter-email');
        $browser->keys('#newsletter-email', $email);
        $browser->pause(500);
        $browser->assertValue('#newsletter-email', $email);
        $browser->assertVisible('#newsletter-submit-btn');
        $browser->click('#newsletter-submit-btn');
        $browser->waitForText('Your email is on our list now!');

        $browser->assertVisible('#newsletter-email');
        $browser->keys('#newsletter-email', $email);
        $browser->pause(500);
        $browser->assertValue('#newsletter-email', $email);
        $browser->assertVisible('#newsletter-submit-btn');
        $browser->click('#newsletter-submit-btn');
        $browser->waitForText('Your email is already on our list!');
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
