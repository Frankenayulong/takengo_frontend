<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\HomeDesktop;
use Tests\Browser\Pages\HomeMobile;

class HomeTest extends DuskTestCase
{
    /**
     * @group home
     * @group mobile
     * @group home_mobile
     */
    public function testMobile()
    {
        $this->browse(function (Browser $browser) {
            $browser->driver->manage()->deleteAllCookies();
            $browser->visit(new HomeMobile);
        });
    }

    /**
     * @group home
     * @group desktop
     * @group home_desktop
     */
    public function testDesktop(){
        $this->browse(function (Browser $browser) {
        $browser->driver->manage()->deleteAllCookies();
            $browser->visit(new HomeDesktop);
        });
    }
}
