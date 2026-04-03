<?php

require_once '../vendor/autoload.php';
$faker = Faker\Factory::create('fr_FR');

$data = [
    'name'  => $faker->name(),
    'email' => $faker->email(),
    'text'  => $faker->text()
];

header('Content-Type: application/json');
echo json_encode($data);

?>