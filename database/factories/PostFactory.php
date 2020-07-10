<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$suffix=[
    'Happy',
    'Sad',
    'Enjoying',
    'Amazing'
];

$factory->define(Post::class, function (Faker $faker) use ($suffix) {
    return [
        'title'=> $faker->city . '' .Arr::random($suffix),
        'content'=> $faker-> text(),

        'user_id' => random_int(1, 5),

    ];
});
