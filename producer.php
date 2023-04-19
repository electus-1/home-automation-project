<?php

//the name of the file that contains the mock data
$file = 'mockData.php';

//get the data from the specified file
$fullData = file_get_contents($file);
$dataArray = explode(',', $users);

//mock data values
$light = true;
$color = ['red', 'blue', 'green'];
$tempature = 45;
$sound = false;
$securityS = ['off', 'low', 'high'];
$door = false;
$roomba = false;
$waterHeater = true;

?>

<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHome-Producer</title>
    <link rel="stylesheet" href="producer-styles.css">
</head>

<body>
    <div class="header">
        <h1>Producer Dashboard</h1>
        <a href="index.html">Logout</a>
    </div>
    <div class="cards">
        <div class="card">
            <p class="title">LIGHTS</p>
            <p class="state">
                <?php
                //shows state of the light(whether its on or off)
                if ($light) {
                    echo 'ON';
                } else {
                    echo 'OFF';
                }

                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">LIGHT COLOR</p>
            <p class="state">
                <?php
                //change the button content of colors according to changes
                if ($color == 'red') {
                    echo 'RED';
                } else if ($color == 'green') {
                    echo 'GREEN';
                } else if ($color == 'blue') {
                    echo 'BLUE';
                } else {
                    echo 'BLUE';
                }

                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">TEMPERATURE</p>
            <p class="state">
                <?php
                //shows the current tempature

                echo $tempature;
                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">SOUND SYSTEM</p>
            <p class="state">
                <?php
                //change the content to show wheter its on or of
                if ($sound == 0) {
                    echo 'OFF';
                } else {
                    echo 'ON';
                }
                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">SECURITY</p>
            <p class="state">
                <?php
                //change the button content 
                if ($securityS == 'low') {
                    echo 'LOW';
                } else if ($securityS == 'high') {
                    echo 'HIGH';
                } else if ($securityS == 'off')
                    echo 'OFF';
                ?>

            </p>

        </div>
        <div class="card">
            <p class="title">DOOR</p>
            <p class="state">
                <?php
                //shows state of the door(wheter its on or off)
                if ($door == 0) {
                    echo 'OPEN';
                } else {
                    echo 'LOCKED';
                }

                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">ROOMBA</p>
            <p class="state">
                <?php
                //shows state of the BUTTON
                if ($roomba == 0) {
                    echo 'CHARGING';
                } else {
                    echo 'CLEANING';
                }

                ?>
            </p>
        </div>
        <div class="card">
            <p class="title">WATER HEATER</p>
            <p class="state">
                <?php
                if ($waterHeater == 0) {
                    echo 'OFF';
                } else {
                    echo 'HEATING WATER';
                }

                ?>
            </p>
        </div>
    </div>
</body>

</html>