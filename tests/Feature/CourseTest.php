<?php

namespace Tests\Feature;

use App\Course;
use Tests\TestCase;

class CourseTest extends TestCase
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

    public function can_list_courses()
    {
        $response = $this->get(route('courses.index'));
        $response->assertSuccessful()->assertJsonStructure(['data', 'status']);
    }

    /** @test */
    public function can_show_course()
    {
        $record   = Course::first();
        $response = $this->get(route('courses.show', [$record->id]));
        $response->assertSuccessful()->assertJsonStructure(['data']);
    }

    /** @test */
    public function can_store_course()
    {
        $courseData = ['name' => ucwords($this->faker->word)];
        $response   = $this->post(route('courses.store'), $courseData);
        $response->assertSuccessful();
        $this->assertDatabaseHas('courses', $courseData);
    }

    /** @test */
    public function can_update_course()
    {
        $record     = Course::first();
        $courseData = ['name' => ucwords($this->faker->word)];
        $response   = $this->put(route('courses.update', ['id' => $record->id]), $courseData);
        $response->assertSuccessful()->assertJsonStructure(['data']);
        $this->assertDatabaseHas('courses', $courseData);
    }

    /** @test */
    public function can_destroy_course()
    {
        $record   = Course::first();
        $response = $this->delete(route('courses.destroy', ['id' => $record->id]), ['id' => $record->id]);
        $this->assertDatabaseMissing('courses', ['id' => $record->id]);
    }
}
