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
        $browser->assertPathIs($this->url());
        $browser->click('button.c-hor-nav-toggler');
        $browser->assertSeeLink('Home');
        $browser->assertSeeLink('Our Cars');
        $browser->assertSeeLink('How it Works');
        $browser->assertSeeLink('Contact Us');
        $browser->assertSeeLink('Sign In');
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
