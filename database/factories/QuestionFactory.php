<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker)
{
    return [
        'content' => $faker->text(42) . '?',
    ];
});
