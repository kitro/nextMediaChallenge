<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Item;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => Str::random(12),
        'description' => Str::random(50),
        'image' => 'default.jpg'
    ];
});
