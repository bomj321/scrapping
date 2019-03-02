<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
      'seccion'         => $faker->name,
      'modelo'          => $faker->text,
      'imagen'          => $faker->imageUrl($width = 640, $height = 480),
      'descuento'       => $faker->randomDigitNotNull, // secret
      'link'            => $faker->url,
      'talla'           => $faker->randomDigitNotNull,
      'precio_anterior' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 50),
      'precio_oferta'   => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 50),
      'updated_at'   => $faker->dateTime($max = 'now', $timezone = null),
      'created_at'   => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
