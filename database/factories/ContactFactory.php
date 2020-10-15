<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Contact::class, function (Faker $faker) {
    $string = "キムラ タケウチ";
    $len = mb_strlen($string);
    $sploded = array();
    while($len-- > 0) { $sploded[] = mb_substr($string, $len, 1); }
    shuffle($sploded);

    return [
        'name'    => join('', $sploded),
        'email'    => $faker->email,
        'phone'    => $faker->phoneNumber,
        'address'    => $faker->address,
        'type'    => rand(0,1),
        'gender'    => '男',
        'message'    => $faker->text,
    ];
});
