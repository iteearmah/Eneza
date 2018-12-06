<?php

use Faker\Generator as Faker;

$factory->define(App\Tutorial::class, function (Faker $faker)
{
    return [
        'content' => $faker->text(540),
    ];
});
