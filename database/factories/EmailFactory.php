<?php

use App\Email;
use App\Search;
use App\Url;
use Faker\Generator as Faker;

$factory->define(Email::class, function (Faker $faker) {
    return [
        'name' => $faker->safeEmail,
        'url_id' => function () {
            return factory(Url::class)->create()->id;
        },
        'search_id' => function () {
            return factory(Search::class)->create()->id;
        }
    ];
});
