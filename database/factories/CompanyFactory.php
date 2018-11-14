<?php
use App\Company;
use App\Asset;
use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'website' => 'http://www.' . $faker->word . '.com', 
        //leaving logo as null on seeding, had some issues with with the faker->image seeding
        'email' => $faker->email,
    ];
});

$factory->define(App\Asset::class, function (Faker $faker) {
    return [
        'model' => $faker->ean8,
        'description' => $faker->sentence,
        'asset_value' => $faker->randomFloat(2, 10, 200),
    ];
});
