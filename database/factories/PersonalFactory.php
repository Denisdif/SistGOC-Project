<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Personal;
use Faker\Generator as Faker;

$factory->define(Personal::class, function (Faker $faker) {

    return [
        'NombrePersonal' => $faker->word,
        'Apellido' => $faker->word,
        'Legajo' => $faker->randomDigitNotNull,
        'FechaNac' => $faker->word,
        'DNI' => $faker->randomDigitNotNull,
        'Rol_id' => $faker->randomDigitNotNull,
        'User_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date,
        'updated_at' => $faker->date
    ];
});
