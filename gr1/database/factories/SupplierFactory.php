<?php

use Faker\Generator as Faker;

$factory->define(App\cd::class, function (Faker $faker) {
    return [
        'cd_username' => $faker->name,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'jlpt' => $faker->name,
        'name' => $faker->name,
        'phonenb' => $faker->phoneNumber,
        'emailofcd' => $faker->unique()->safeEmail,
        'created_at' => new DateTime,
        'dateofbirth' => new DateTime,
        'updated_at' => new DateTime,
    ];
});