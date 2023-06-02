<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('./home-auth-84213-firebase-adminsdk-8nh4n-dc122e0128.json')
    ->withDatabaseUri('https://home-auth-84213-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
