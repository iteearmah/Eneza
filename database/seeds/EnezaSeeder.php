<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EnezaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //create course
        factory(App\Course::class, 2)->create()->each(function ($course)
        {
            //create subjects
            factory(App\Subject::class, 3)->create()->each(function ($subject) use ($course
            )
            {
                //create course subjects
                factory(App\SubjectCourse::class)->create([
                    'course_id'  => $course,
                    'subject_id' => $subject,
                ]);
            });

            //create tutorials
            factory(App\Tutorial::class, 2)->create()->each(function ($tutorial) use ($course
            )
            {
                //create course tutorials
                factory(App\CourseTutorial::class)->create([
                    'course_id'   => $course,
                    'tutorial_id' => $tutorial,
                ]);
            });

            //create quizzes
            factory(App\Quiz::class, 2)->create()->each(function ($quiz) use ($course
            )
            {
                //create course quizzes
                factory(App\CourseQuiz::class)->create([
                    'course_id' => $course,
                    'quiz_id'   => $quiz,
                ]);

                //create question
                factory(App\Question::class, 3)->create()->each(function ($question) use ($quiz
                )
                {
                    //create quiz question
                    factory(App\QuizQuestion::class)->create([
                        'quiz_id'     => $quiz,
                        'question_id' => $question,
                    ]);

                    //create choice

                    $numChoices   = rand(2, 5);
                    $correctCheck = [];
                    for ($i = 0; $i <= $numChoices; $i++)
                    {
                        $faker   = Faker::create();
                        $correct = $faker->optional(0.9, 'false')->randomElement(['true', 'false']);
                        if ($numChoices == $i && !in_array('true', $correctCheck))
                        {
                            $correct = 'true';
                        }

                        factory(App\Choice::class)->create([
                            'question_id' => $question,
                            'content'     => ucwords($faker->word),
                            'correct'     => (in_array('true', $correctCheck)) ? 'false' : $correct,
                        ]);
                        $correctCheck[] = $correct;
                    }

                });
            });

        });
    }
}
