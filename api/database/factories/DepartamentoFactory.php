<?php

use Faker\Generator as Faker;

$factory->define(App\Departamento::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->word,
        'descripcion' => $faker->text
    ];
});
