<?php

namespace Tests\Unit;

use App\Models\Leagues;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_a_basic_request()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_interacting_with_post()
    {
        $response = $this->post(route('leagues.store'), ['name' => 'Sally2', 'season' => "2020"]);

        $response->assertStatus(302);
    }

//    public function test_interacting_with_cookies()
//    {
//        $response = $this->withCookie('color', 'blue')->get('/');
//
//        $response = $this->withCookies([
//            'color' => 'blue',
//            'name' => 'Taylor',
//        ])->get('/');
//    }
//
//    public function test_interacting_with_the_session()
//    {
//        $response = $this->withSession(['banned' => false])->get('/');
//    }

//    public function test_an_action_that_requires_authentication()
//    {
//        $leagues = Leagues::factory(1)->create();
//
//        $response = $this->actingAs($leagues)
//            ->withSession(['banned' => false])
//            ->get('/');
//
//        $this->actingAs($leagues, 'web');
//    }

//    public function test_basic_test()
//    {
//        $response = $this->get('/');
//
//        $response->ddHeaders();
//
//        $response->ddSession();
//
//        $response->dd();
//    }

//    public function test_making_an_api_request()
//    {
//        $response = $this->postJson(route('leagues.store'), ['name' => 'Sally', 'season' => "7777"]);
//
//        $response
//            ->assertStatus(302)
//            ->assertJson([
//                'created' => true,
//            ]);
//    }
}
