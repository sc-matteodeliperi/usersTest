<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    public function test_a_user_create()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
        ];;

        $this->post('/users/store', $attributes);
    }

    public function test_a_user_require_a_name()
    {
        $attributes = factory('App\Users')->raw(['name' =>'']);

        $this->post('users', $attributes)->assertSessionHasErrors('name');
    }

    public function test_a_user_require_a_surname()
    {
        $attributes = factory('App\Users')->raw(['surname' =>'']);

        $this->post('users', $attributes)->assertSessionHasErrors('surname');
    }

    public function test_a_user_require_a_email()
    {
        $attributes = factory('App\Users')->raw(['email' =>'']);

        $this->post('users', $attributes)->assertSessionHasErrors('email');
    }

    public function test_a_user_require_a_phone()
    {
        $attributes = factory('App\Users')->raw(['phone' =>'']);

        $this->post('users', $attributes)->assertSessionHasErrors('phone');
    }
}
