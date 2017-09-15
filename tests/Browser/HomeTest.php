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
     * A Dusk test example.
     *
     * @return void
     */
    // public function testMobile()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit(new HomeMobile);
    //     });
    // }
    public function testDesktop(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomeDesktop);
        });
    }
}
