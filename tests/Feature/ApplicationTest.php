<?php

use Tests\TestCase;
use App\Models\Application;
use App\Models\User;

class ApplicationTest extends TestCase
{
    /**
     * @test
     */
    public function it_gets_applications_with_filters()
    {
        // Arrange
        $user = User::factory()->create();
        $application = Application::factory()->create(['state' => 'archived']);
        $application2 = Application::factory()->create(['state' => 'active']);
        $application3 = Application::factory()->create(['state' => 'new']);
        // Act
        $response = $this->actingAs($user)->get('/api/applications?state=archived');
        // Assert
        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                $application->toArray()
            ]
        ]);
    }

}
