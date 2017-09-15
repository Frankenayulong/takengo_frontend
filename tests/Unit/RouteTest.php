<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     public function testRootRoute()
     {
         $response = $this->get('/');
         $response->assertStatus(200);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testCarsRoute()
     {
         $response = $this->get('/cars');
         $response->assertStatus(200);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testCarShowRoute()
     {
         $response = $this->get('/cars/1');
         $response->assertStatus(200);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testHowItWorksRoute()
     {
         $response = $this->get('/how-it-works');
         $response->assertStatus(200);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testContactUsRoute()
     {
         $response = $this->get('/contact-us');
         $response->assertStatus(200);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testContactUsSubmitRoute()
     {
         $response = $this->post('/contact-us');
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testProfileRoute()
     {
         $response = $this->get('/profile');
         $response->assertStatus(302);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testProfileEditRoute()
     {
         $response = $this->get('/profile/edit');
         $response->assertStatus(302);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testProfileEditSubmitRoute()
     {
         $response = $this->post('/profile/edit');
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testFAQRoute()
     {
         $response = $this->get('/faq');
         $response->assertStatus(200);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testTermsConditionsRoute()
     {
         $response = $this->get('/terms-and-conditions');
         $response->assertStatus(200);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testAboutUsRoute()
     {
         $response = $this->get('/about-us');
         $response->assertStatus(200);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testBookCarRoute()
     {
         $response = $this->get('/cars/book/1');
         $response->assertStatus(302);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testBookHistoryRoute()
     {
         $response = $this->get('/history');
         $response->assertStatus(302);
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }

     public function testRegisterNewsletterSubmitRoute()
     {
         $response = $this->post('/register-newsletter');
         $this->assertTrue($response->getStatusCode() != 404);
         $this->assertTrue($response->getStatusCode() != 500);
     }
}
