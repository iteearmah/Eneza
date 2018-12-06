<?php

namespace Tests\Feature;

use App\Quiz;
use Tests\TestCase;

class QuizTest extends TestCase
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

    public function can_list_quizzes()
    {
        $response = $this->get(route('quizzes.index'));
        $response->assertSuccessful()->assertJsonStructure(['data', 'status']);
    }

    /** @test */
    public function can_show_quiz()
    {
        $record   = Quiz::first();
        $response = $this->get(route('quizzes.show', [$record->id]));
        $response->assertSuccessful()->assertJsonStructure(['data']);
    }

    /** @test */
    public function can_store_quiz()
    {
        $quizData = ['title' => $this->faker->text(42)];
        $response = $this->post(route('quizzes.store'), $quizData);
        $response->assertSuccessful();
        $this->assertDatabaseHas('quizzes', $quizData);
    }

    /** @test */
    public function can_update_quiz()
    {
        $record   = Quiz::first();
        $quizData = ['title' => $this->faker->text(42)];
        $response = $this->put(route('quizzes.update', ['id' => $record->id]), $quizData);
        $response->assertSuccessful()->assertJsonStructure(['data']);
        $this->assertDatabaseHas('quizzes', $quizData);
    }

    /** @test */
    public function can_destroy_quiz()
    {
        $record   = Quiz::first();
        $response = $this->delete(route('quizzes.destroy', ['id' => $record->id]), ['id' => $record->id]);
        $this->assertDatabaseMissing('quizzes', ['id' => $record->id]);
    }
}
