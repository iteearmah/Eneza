<?php

namespace Tests\Feature;

use App\Subject;
use Tests\TestCase;

class SubjectTest extends TestCase
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

    public function can_list_subjects()
    {
        $response = $this->get(route('subjects.index'));
        $response->assertSuccessful()->assertJsonStructure(['data', 'status']);
    }

    /** @test */
    public function can_show_subject()
    {
        $record   = Subject::first();
        $response = $this->get(route('subjects.show', [$record->id]));
        $response->assertSuccessful()->assertJsonStructure(['data']);
    }

    /** @test */
    public function can_store_subject()
    {
        $subjectData = ['name' => ucwords($this->faker->word)];
        $response    = $this->post(route('subjects.store'), $subjectData);
        $response->assertSuccessful();
        $this->assertDatabaseHas('subjects', $subjectData);
    }

    /** @test */
    public function can_update_subject()
    {
        $record      = Subject::first();
        $subjectData = ['name' => ucwords($this->faker->word)];
        $response    = $this->put(route('subjects.update', ['id' => $record->id]), $subjectData);
        $response->assertSuccessful()->assertJsonStructure(['data']);
        $this->assertDatabaseHas('subjects', $subjectData);
    }

    /** @test */
    public function can_destroy_subject()
    {
        $record   = Subject::first();
        $response = $this->delete(route('subjects.destroy', ['id' => $record->id]), ['id' => $record->id]);
        $this->assertDatabaseMissing('subjects', ['id' => $record->id]);
    }
}
