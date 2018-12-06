<?php

namespace Tests\Feature;

use App\Tutorial;
use Tests\TestCase;

class TutorialTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */

    public function can_list_tutorials()
    {
        $response = $this->get(route('tutorials.index'));
        $response->assertSuccessful()->assertJsonStructure(['data', 'status']);
    }

    /** @test */
    public function can_show_tutorial()
    {
        $record   = Tutorial::first();
        $response = $this->get(route('tutorials.show', [$record->id]));
        $response->assertSuccessful()->assertJsonStructure(['data']);
    }

    /** @test */
    public function can_store_tutorial()
    {
        $tutorialData = ['content' => $this->faker->text(540)];
        $response     = $this->post(route('tutorials.store'), $tutorialData);
        $response->assertSuccessful();
        $this->assertDatabaseHas('tutorials', $tutorialData);
    }

    /** @test */
    public function can_update_tutorial()
    {
        $record       = Tutorial::first();
        $tutorialData = ['content' => $this->faker->text(540)];
        $response     = $this->put(route('tutorials.update', ['id' => $record->id]), $tutorialData);
        $response->assertSuccessful()->assertJsonStructure(['data']);
        $this->assertDatabaseHas('tutorials', $tutorialData);
    }

    /** @test */
    public function can_destroy_tutorial()
    {
        $record   = Tutorial::first();
        $response = $this->delete(route('tutorials.destroy', ['id' => $record->id]), ['id' => $record->id]);
        $this->assertDatabaseMissing('tutorials', ['id' => $record->id]);
    }
}
