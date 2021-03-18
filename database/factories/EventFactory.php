<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Model\Event::class, function (Faker $faker) {
    $category = \App\Model\Category::inRandomOrder()->first();
    $organizer = \App\Model\Organizer::first();
    return [
        'title' => $faker->words(3,true),
        'slug' => $faker->slug,
        'event_date' =>$faker->dateTimeBetween('tomorrow','+12 months')->format('Y-m-d'),
        'description' => $faker->paragraph(3),
        'description_raw' => $faker->paragraph(3),
        'street_1' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'featured' => $faker->randomElement([1,0]),
        'image' =>  $faker->randomElement(['p1.jpg','p2.jpg']),
        'category_id' => $category->id,
        'organizer_id' => $organizer->id,
        'ticket_status' => $faker->randomElement(['on sale', 'closed'])
    ];
});
$factory->afterCreating(Event::class, function($event, $faker) {
    $regularPrices = [500, 800, 950, 1000, 1200];
    $vipPrices = [2000, 2500, 3000, 3500];
    $vvipPrices = [4000, 4500, 5000, 5500, 6000];
    $event->prices()->saveMany([
        new App\Model\EventPrice(['title' => 'regular', 'amount' => Arr::random($regularPrices,1)[0], 'capacity' => random_int(25,40)]),
        new App\Model\EventPrice(['title' => 'vip', 'amount' => Arr::random($vipPrices,1)[0], 'capacity' => random_int(15,20)]),
        new App\Model\EventPrice(['title' => 'vvip', 'amount' => Arr::random($vvipPrices,1)[0], 'capacity' => random_int(6,14)]),
    ]);
});

