<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\RolPersonal;
use Faker\Generator as Faker;

$factory->define(RolPersonal::class, function (Faker $faker) {

    return [
        'NombreRol' => $faker->word,
        'Descripcion' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
