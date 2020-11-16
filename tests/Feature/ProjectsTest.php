<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    /** @test
     * create a new project:
     * - see it in a database table
     * - see it in browser
     *
     * @return void
     */
    use WithFaker, RefreshDatabase;

    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling(); // show exceptions

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $attributes);
        $this->assertDatabaseHas('projects', $attributes);
        $this->get('/projects')->assertSee($attributes['title']);

    }
}
