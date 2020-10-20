<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sexo;
use Faker\Generator as Faker;

$factory->define(Sexo::class, function (Faker $faker) {

    return [
        'Nombre_sexo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
