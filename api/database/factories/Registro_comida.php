<?php

use Faker\Generator as Faker;

$factory->define(App\Registro_comida::class, function (Faker $faker) {
    return [
        //
        'fecha' => $faker->dateTimeThisYear()
    ];
});
