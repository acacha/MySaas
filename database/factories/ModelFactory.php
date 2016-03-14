<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Laravel\Cashier\Subscription::class, function (Faker\Generator $faker) {
    return [
        'stripe_id' => $faker->uuid,
        'stripe_plan' => 'monthly',
        'name' => $faker->name,
        'quantity' => 950,
        'created_at' => Carbon::now()->addDay($faker->numberBetween(0,30))
    ];
});

