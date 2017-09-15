<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\CarDesktop;
use Tests\Browser\Pages\CarMobile;
class CarTest extends DuskTestCase
{
    /**
     * @group car
     * @group desktop
     * @group car_desktop
     */
    public function testCarDesktop()
    {
        $this->browse(function (Browser $browser) {
            $browser->driver->manage()->deleteAllCookies();
            $browser->visit(new CarDesktop);
        }); 
    }

    /**
     * @group car
     * @group mobile
     * @group car_mobile
     */
    public function testCarMobile()
    {
        $this->browse(function (Browser $browser) {
            $browser->driver->manage()->deleteAllCookies();
            $browser->visit(new CarMobile);
        }); 
    }
}
