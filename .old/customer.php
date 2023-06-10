<?php


$conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

//write query for all infos
$sql = 'SELECT light, lightColor, tempature, sound, securityS, door, roomba, waterHeater, email FROM device';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

//frees result from memory for good practice
mysqli_free_result($result);

//print_r($infos);
//if they are not null they will be shown in the page
$last = count($infos) - 1;
$light = $infos[$last]['light'];
$color = $infos[$last]['lightColor'];
$sound = $infos[$last]['sound'];
$door = $infos[$last]['door'];
$securityS = $infos[$last]['securityS'];
$roomba = $infos[$last]['roomba'];
$waterHeater = $infos[$last]['waterHeater'];
$tempature = $infos[$last]['tempature'];
$email = 'a@gmail.com';

/*For all the if statements below, if a certain button is pressed then update the database */

// If the button is clicked, update the database
//mysqli_real_escape_string secures the input we want to send to the data base
if (isset($_POST['light'])) {
    //if light is 1 then val is 0 and vice versa
    $val = '';
    ($light == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);
    $new_sql = "INSERT INTO device VALUES ({$new_value}, '{$color}', {$tempature}, {$sound}, '{$securityS}', {$door}, {$roomba}, {$waterHeater}, '{$email}')";
    //$new_sql = "UPDATE device SET light = '$new_value'";
    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header('Location: ./customer.php');
}

if (isset($_POST['sound'])) {
    $val = '';
    ($sound == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);
    $new_sql = "INSERT INTO device VALUES ({$light}, '{$color}', {$tempature}, {$new_value}, '{$securityS}', {$door}, {$roomba}, {$waterHeater}, '{$email}')";

    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header('Location: ./customer.php');
}


if (isset($_POST['lock'])) {

    $val = '';
    ($door == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);
    $new_sql = "INSERT INTO device VALUES ({$light}, '{$color}', {$tempature}, {$sound}, '{$securityS}', {$new_value}, {$roomba}, {$waterHeater}, '{$email}')";

    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header('Location: ./customer.php');
}

if (isset($_POST['roomba'])) {
    $val = '';
    ($roomba == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);
    $new_sql = "INSERT INTO device VALUES ({$light}, '{$color}', {$tempature}, {$sound}, '{$securityS}', {$door}, {$new_value}, {$waterHeater}, '{$email}')";

    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header('Location: ./customer.php');
}

if (isset($_POST['heater'])) {
    $val = '';
    ($waterHeater == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);
    $new_sql = "INSERT INTO device VALUES ({$light}, '{$color}', {$tempature}, {$sound}, '{$securityS}', {$door}, {$roomba}, {$new_value}, '{$email}')";

    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header('Location: ./customer.php');
}

//whatever is the input change the database accordingly for the color 
if (isset($_POST['change-color'])) {
    $selectedColor = $_POST['colorlist'];

    // Update the database with the selected color
    $new_value = mysqli_real_escape_string($conn, $selectedColor);
    $new_sql = "INSERT INTO device VALUES ({$light}, '{$new_value}', {$tempature}, {$sound}, '{$securityS}', {$door}, {$roomba}, {$waterHeater}, '{$email}')";

    mysqli_query($conn, $new_sql);

    echo ('Button pushed');

    //refresh the page to relod the database
    header('Location: ./customer.php');
}

//whatever is the input change the database accordingly for the security
if (isset($_POST['security'])) {
    $selectedSec = $_POST['sec'];

    // Update the database with the selected security option
    $new_value = mysqli_real_escape_string($conn, $selectedSec);
    $new_sql = "INSERT INTO device VALUES ({$light}, '{$color}', {$tempature}, {$sound}, '{$new_value}', {$door}, {$roomba}, {$waterHeater}, '{$email}')";

    mysqli_query($conn, $new_sql);

    //refresh the page to relod the database
    header('Location: ./customer.php');
}

if (isset($_POST['air'])) {
    $selectedDeg = $_POST['temp'];

    // Update the database with the entered value
    $new_value = mysqli_real_escape_string($conn, $selectedDeg);
    $new_sql = "INSERT INTO device VALUES ({$light}, '{$color}', {$new_value}, {$sound}, '{$securityS}', {$door}, {$roomba}, {$waterHeater}, '{$email}')";

    mysqli_query($conn, $new_sql);

    //refresh the page to relod the database
    header('Location: ./customer.php');
}
?>

<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHome-Customer</title>
    <link rel="stylesheet" href="./styles/producer-styles.css">
    <script src="./script/producer.js" defer></script>
    <script src="./script/displayCustomer.js" defer></script>
</head>

<body>
    <div class="header">
        <h1>Customer Dashboard</h1>
        <a href="index.html">Logout</a>
    </div>
    <div class="cards">
        <div class="card lights">
            <p class="title">LIGHTS</p>
            <p class="state" data-state="off">
                <?php
                //shows state of the light(wheter its on or off)
                if ($light == 0) {
                    echo '<img src="./img/display/lights-off.png" width="50px" height="50px" img/> </br>';
                    echo 'OFF';
                } else {
                    echo '<img src="./img/display/lights-on.png" width="50px" height="50px" img/> </br>';
                    echo 'ON';
                }

                ?>
            </p>
            <form action="" class="light-control" method="post">
                <button type="submit" name="light">
                    <?php
                    //shows state of the BUTTON
                    if ($light == 0) {
                        echo 'TURN ON';
                        echo '';
                    } else {
                        echo 'TURN OFF';
                    }

                    ?>
                </button>
            </form>
        </div>
        <div class="card colors">
            <p class="title">LIGHT COLOR</p>
            <p class="state" data-state="green">
                <?php
                //change the button content 
                if ($color == 'red') {
                    echo '<img src="./img/display/red-light.png" width="50px" height="50px" img/> </br>';
                    echo 'RED';
                } else if ($color == 'green') {
                    echo '<img src="./img/display/green-light.png" width="50px" height="50px" img/> </br>';

                    echo 'GREEN';
                } else if ($color == 'blue') {
                    echo '<img src="./img/display/blue-light.png" width="50px" height="50px" img/> </br>';
                    echo 'BLUE';
                }

                ?>
            </p>
            <form onsubmit="submitColor " action="" class="color-control" method="post">
                <select name="colorlist" id="colorlist">
                    <option value="red">RED</option>
                    <option value="green">GREEN</option>
                    <option value="blue">BLUE</option>
                </select>
                <button type="submit" name="change-color">APPLY CHANGES</button>
            </form>
        </div>
        <div class="card temp">
            <p class="title">ROOM TEMPERATURE</p>
            <p class="state">
                <?php
                //shows the current tempature
                echo '<img src="./img/display/temprature.png" width="50px" height="50px" img/> </br>';

                echo $tempature;
                ?>
            </p>
            <form action="" method="post" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px;">
                <div class="temp-control">
                    <input type="number" required name="temp" min="8" max="38" value="8" step=".01">
                </div>
                <button type="submit" name="air">START AIR CONDITIONER</button>
            </form>
        </div>
        <div class="card sound">
            <p class="title">SOUND SYSTEM</p>
            <p class="state">
                <?php
                //change the content to show wheter its on or of
                if ($sound == 0) {
                    echo '<img src="./img/display/sound-off.png" width="50px" height="50px" img/> </br>';

                    echo 'OFF';
                } else {
                    echo '<img src="./img/display/sound-on.png" width="50px" height="50px" img/> </br>';

                    echo 'ON';
                }
                ?>
            </p>
            <form action="" method="post">
                <button type="submit" name="sound">
                    <?php
                    //shows state of the BUTTON
                    if ($sound == 0) {
                        echo 'TURN ON';
                    } else {
                        echo 'TURN OFF';
                    }

                    ?>
                </button>
            </form>
        </div>
        <div class="card security">
            <p class="title">SECURITY</p>
            <p class="state">
                <?php
                //change the button content 
                if ($securityS == 'low') {
                    echo '<img src="./img/display/security-middle.png" width="50px" height="50px" img/> </br>';

                    echo 'LOW';
                } else if ($securityS == 'high') {
                    echo '<img src="./img/display/security-high.png" width="50px" height="50px" img/> </br>';

                    echo 'HIGH';
                } else if ($securityS == 'off') {
                    echo '<img src="./img/display/security-off.png" width="50px" height="50px" img/> </br>';

                    echo 'OFF';
                }

                ?>
            </p>
            <form action="" class="security-control" method="post">
                <select name="sec" id="sec">
                    <option value="low">LOW</option>
                    <option value="high">HIGH</option>
                    <option value="off">OFF</option>
                </select>
                <button type="submit" name="security">APPLY CHANGES</button>
            </form>
        </div>
        <div class="card lock">
            <p class="title">DOOR LOCK</p>
            <p class="state">
                <?php
                //shows state of the door(wheter its on or off)
                if ($door == 0) {
                    echo '<img src="./img/display/door-unlocked.png" width="50px" height="50px" img/> </br>';

                    echo 'OPEN';
                } else {
                    echo '<img src="./img/display/door-locked.png" width="50px" height="50px" img/> </br>';

                    echo 'LOCKED';
                }

                ?>
            </p>
            <form action="" method="post">
                <button type="submit" name="lock">
                    <?php
                    //shows state of the BUTTON
                    if ($door == 0) {
                        echo 'LOCK';
                    } else {
                        echo 'UNLOCK';
                    }

                    ?>
                </button>
            </form>
        </div>
        <div class="card roomba">
            <p class="title">ROOMBA</p>
            <p class="state">
                <?php
                //shows state of the ROOMBA cleaning robot(wheter its on or off)
                if ($roomba == 0) {
                    echo '<img src="./img/display/charging.png" width="50px" height="50px" img/> </br>';

                    echo 'CHARGING';
                } else {
                    echo '<img src="./img/display/roomba.png" width="50px" height="50px" img/> </br>';
                    echo 'CLEANING';
                }

                ?>
            </p>
            <form action="" method="post">
                <button type="submit" name="roomba">
                    <?php
                    //shows state of the ROOMBA cleaning robot
                    if ($roomba == 0) {
                        echo 'START';
                    } else {
                        echo 'STOP';
                    }

                    ?>
                </button>
            </form>
        </div>
        <div class="card heater">
            <p class="title">WATER HEATER</p>
            <p class="state">
                <?php
                if ($waterHeater == 0) {
                    echo '<img src="./img/display/heating-off.png" width="50px" height="50px" img/> </br>';

                    echo 'OFF';
                } else {
                    echo '<img src="./img/display/heating-on.png" width="50px" height="50px" img/> </br>';

                    echo 'HEATING WATER';
                }

                ?>
            </p>
            <form action="" method="post">
                <button type="submit" name="heater">
                    <?php
                    if ($waterHeater == 0) {
                        echo 'TURN ON';
                    } else {
                        echo 'TURN OFF';
                    }

                    ?>
                </button>
            </form>
        </div>
    </div>
</body>

</html>