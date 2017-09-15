<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\ContactUs;

class ContactUsTest extends DuskTestCase
{
    /**
     * @group contact_us
     * @group desktop
     * @group contact_us_desktop
     */
    public function testContactUs()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ContactUs);
        });
    }
}
