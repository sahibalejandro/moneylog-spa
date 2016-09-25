<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Account::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'name' => $faker->name,
    ];
});

$factory->define(App\Payment::class, function ($faker, $params) {

    $userId = isset($params['user_id'])
        ? $params['user_id']
        : factory(App\User::class)->create()->id;

    return [
        'amount' => $faker->numberBetween(10000, 100000),
        'description' => $faker->sentence,
        'user_id' => $userId,
        'account_id' => function () use ($userId) {
            return factory(App\Account::class)
                ->create(['user_id' => $userId])->id;
        },
        'due_date' => $faker->dateTimeBetween('2 day', '1 week'),
    ];
});

$factory->define(App\Movement::class, function (Faker\Generator $faker, $params) {

    $userId = isset($params['user_id'])
        ? $params['user_id']
        : factory(App\User::class)->create()->id;

    return [
        'user_id' => $userId,
        'account_id' => function () use ($userId) {
            return factory(App\Account::class)->create(['user_id' => $userId]);
        },
        'description' => $faker->sentence,
        'amount' => $faker->numberBetween(-100000, 100000),
        'date' => $faker->dateTimeBetween('-2 month', 'now'),
    ];
});
