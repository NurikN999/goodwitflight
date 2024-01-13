<?php

use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * @test
     */
    public function it_register_user()
    {
        $email = Faker\Factory::create()->email;
        $firstName = Faker\Factory::create()->firstName;
        $lastName = Faker\Factory::create()->lastName;
        // Act
        $response = $this->post('/api/register', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => 'password',
            'password_confirm' => 'password'
        ]);

        // Assert

        $response->assertStatus(201);

        $response->assertJson([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
        ]);

        $this->assertDatabaseHas('users', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
        ]);

    }

}
