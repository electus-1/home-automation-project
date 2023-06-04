<?php
$email = $_GET['variable'];
$room = $_GET['variable2'];

//echo ($email . " and " . $room);
$conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

//write query for all infos
$sql = "SELECT * FROM {$room}";


//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

//frees result from memory for good practice
mysqli_free_result($result);
//print_r($infos);
$last = count($infos) - 1;
$light = $infos[$last]['light'];
$color = $infos[$last]['lightColor'];
$lightColor = $infos[$last]['lightColor'];
$sound = $infos[$last]['sound'];
$door = $infos[$last]['door'];
$securityS = $infos[$last]['securityS'];
$roomba = $infos[$last]['roomba'];
$waterHeater = $infos[$last]['waterHeater'];
$tempature = $infos[$last]['tempature'];

?>


<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHome-Producer</title>
    <link rel="stylesheet" href="../styles/producer-entry-styles.css">
    <script src="../script/displayProducer.js" defer></script>
</head>

<body>
    <div class="header">
        <h1><?php echo ($room); ?></h1>

        <?php
        //goes back and passes the email
        echo ("<a href='./table_device_prod.php?variable={$email}&variable2={$room}'>Device Info</a>");
        echo ("<a href='./customer_entry.php?variable={$email}'>Back</a>");
        ?>
        <a href="../index.html">Logout</a>

    </div>



    <div class="cards">
        <?php
        if ($light !== null) {
        ?>
            <div class="card lights">
                <p class="title">LIGHTS</p>
                <p class="state" data-state="off">
                    <?php

                    //shows state of the light(wheter its on or off)
                    if ($light == 0) {
                        echo '<img src="../img/display/lights-off.png" width="50px" height="50px" img/> </br>';
                        echo 'OFF';
                    } else {
                        echo '<img src="../img/display/lights-on.png" width="50px" height="50px" img/> </br>';
                        echo 'ON';
                    }
                    ?> </p>

            </div> <?php }

                if ($color !== null) {
                    ?>
            <div class="card colors">
                <p class="title">LIGHT COLOR</p>
                <p class="state" data-state="green">
                    <?php
                    //change the button content 
                    if ($color == 'red') {
                        echo '<img src="../img/display/red-light.png" width="50px" height="50px" img/> </br>';
                        echo 'RED';
                    } else if ($color == 'green') {
                        echo '<img src="../img/display/green-light.png" width="50px" height="50px" img/> </br>';

                        echo 'GREEN';
                    } else if ($color == 'blue') {
                        echo '<img src="../img/display/blue-light.png" width="50px" height="50px" img/> </br>';
                        echo 'BLUE';
                    }
                    ?>
                </p>

            </div>
        <?php
                }

                if ($tempature !== null) {
        ?>
            <div class="card temp">
                <p class="title">ROOM TEMPERATURE</p>
                <p class="state">
                    <?php
                    //shows the current tempature
                    echo '<img src="../img/display/temprature.png" width="50px" height="50px" img/> </br>';

                    echo $tempature;
                    ?>
                </p>

            </div>
        <?php
                }

                if ($sound !== null) {
        ?>
            <div class="card sound">
                <p class="title">SOUND SYSTEM</p>
                <p class="state">

                    <?php
                    //change the content to show wheter its on or of
                    if ($sound == 0) {
                        echo '<img src="../img/display/sound-off.png" width="50px" height="50px" img/> </br>';

                        echo 'OFF';
                    } else {
                        echo '<img src="../img/display/sound-on.png" width="50px" height="50px" img/> </br>';

                        echo 'ON';
                    }
                    ?>
                </p>

            </div>
        <?php
                }

                if ($securityS !== null) {
        ?>
            <div class="card security">
                <p class="title">SECURITY</p>
                <p class="state">
                    <?php
                    //change the button content 
                    if ($securityS == 'low') {
                        echo '<img src="../img/display/security-middle.png" width="50px" height="50px" img/> </br>';

                        echo 'LOW';
                    } else if ($securityS == 'high') {
                        echo '<img src="../img/display/security-high.png" width="50px" height="50px" img/> </br>';

                        echo 'HIGH';
                    } else if ($securityS == 'off') {
                        echo '<img src="../img/display/security-off.png" width="50px" height="50px" img/> </br>';

                        echo 'OFF';
                    }

                    ?>
                </p>

            </div>
        <?php
                }

                if ($door !== null) {
        ?>
            <div class="card lock">
                <p class="title">DOOR LOCK</p>
                <p class="state">
                    <?php

                    //shows state of the door(wheter its on or off)
                    if ($door == 0) {
                        echo '<img src="../img/display/door-unlocked.png" width="50px" height="50px" img/> </br>';

                        echo 'OPEN';
                    } else {
                        echo '<img src="../img/display/door-locked.png" width="50px" height="50px" img/> </br>';

                        echo 'LOCKED';
                    }
                    ?>
                </p>

            </div>
        <?php
                }

                if ($roomba !== null) {
        ?>
            <div class="card roomba">
                <p class="title">ROOMBA</p>
                <p class="state">
                    <?php

                    //shows state of the ROOMBA cleaning robot(wheter its on or off)
                    if ($roomba == 0) {
                        echo '<img src="../img/display/charging.png" width="50px" height="50px" img/> </br>';

                        echo 'CHARGING';
                    } else {
                        echo '<img src="../img/display/roomba.png" width="50px" height="50px" img/> </br>';
                        echo 'CLEANING';
                    }

                    ?>
                </p>

            </div>
        <?php
                }

                if ($waterHeater !== null) {
        ?>
            <div class="card heater">
                <p class="title">WATER HEATER</p>
                <p class="state">
                    <?php
                    if ($waterHeater == 0) {
                        echo '<img src="../img/display/heating-off.png" width="50px" height="50px" img/> </br>';

                        echo 'OFF';
                    } else {
                        echo '<img src="../img/display/heating-on.png" width="50px" height="50px" img/> </br>';

                        echo 'HEATING WATER';
                    }

                    ?>
                </p>

            </div>
        <?php
                }
        ?>

    </div>


</body>

</html>