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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
function mobileFormat() {
  $prefixes = [
    813, 817, 900,
    905, 906, 907,
    908, 909, 910,
    911, 912, 915,
    916, 917, 918,
    919, 920, 921,
    922, 923, 925,
    926, 927, 928,
    929, 930, 931,
    932, 933, 934,
    935, 936, 937,
    938, 939, 940,
    942, 943, 944,
    946, 947, 948,
    949, 971, 973,
    974, 975, 977,
    978, 979, 980,
    989, 994, 996,
    997, 998, 999
  ];

  return $prefixes[mt_rand(0, 56)] . '#######';
}

$factory->defineAs(App\Users::class, 'employers', function (Faker\Generator $faker) {
    $sex = mt_rand(0, 9) % 2 === 0 ? 'Male' : 'Female';

    return [
        'mobile_number' => $faker->numerify(mobileFormat()),
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'first_name' => $faker->firstName($sex),
        'middle_name' => mt_rand(0, 9) % 2 === 0 ? $faker->lastName : null,
        'last_name' => $faker->lastName,
        'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'sex' => $sex,
        'type' => 'Employer'
    ];
});

$factory->defineAs(App\Users::class, 'applicants', function (Faker\Generator $faker) {
    $sex = mt_rand(0, 9) % 2 === 0 ? 'Male' : 'Female';

    return [
        'mobile_number' => $faker->numerify(mobileFormat()),
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'first_name' => $faker->firstName($sex),
        'middle_name' => mt_rand(0, 9) % 2 === 0 ? $faker->lastName : null,
        'last_name' => $faker->lastName,
        'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'sex' => $sex,
        'type' => 'Applicant'
    ];
});
