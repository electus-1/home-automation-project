<!DOCTYPE php>

<?php
// $conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

// //write query for all infos
// $sql = 'SELECT light, lightColor, tempature, sound, securityS, door, roomba, waterHeater FROM device';

// //make query and get result
// $result = mysqli_query($conn, $sql);

// //fetch the resulting rows as an array
// $infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

// //frees result from memory for good practice
// mysqli_free_result($result);

// print_r($infos);
// $light = $infos[0]['light'];
// $color = $infos[0]['lightColor'];
// $sound = $infos[0]['sound'];
// $door = $infos[0]['door'];
// $roomba = $infos[0]['roomba'];
// $waterHeater = $infos[0]['waterHeater'];


// /*For all the if statements below, if a certain button is pressed then update the database */

// // If the button is clicked, update the database
// //mysqli_real_escape_string secures the input we want to send to the data base
// if (isset($_POST['light'])) {
//     $new_value = mysqli_real_escape_string($conn, !$light);
//     $new_sql = "UPDATE device SET light = '$new_value'";
//     if (mysqli_query($conn, $new_sql)) {
//         //success
//     } else {
//         echo 'query error: ' . mysqli_error($conn);
//     }
// }

// if (isset($_POST['sound'])) {
//     $new_value = mysqli_real_escape_string($conn, !$sound);
//     $new_sql = "UPDATE device SET sound = '$new_value'";
//     if (mysqli_query($conn, $new_sql)) {
//         //success
//     } else {
//         echo 'query error: ' . mysqli_error($conn);
//     }
// }


// if (isset($_POST['lock'])) {
//     $new_value = mysqli_real_escape_string($conn, !$door);
//     $new_sql = "UPDATE device SET door = '$new_value'";
//     if (mysqli_query($conn, $new_sql)) {
//         //success
//     } else {
//         echo 'query error: ' . mysqli_error($conn);
//     }
// }

// if (isset($_POST['roomba'])) {
//     $new_value = mysqli_real_escape_string($conn, !$roomba);
//     $new_sql = "UPDATE device SET roomba = '$new_value'";
//     if (mysqli_query($conn, $new_sql)) {
//         //success
//     } else {
//         echo 'query error: ' . mysqli_error($conn);
//     }
// }

// if (isset($_POST['heater'])) {
//     $new_value = mysqli_real_escape_string($conn, !$waterHeater);
//     $new_sql = "UPDATE device SET waterHeater = '$new_value'";
//     if (mysqli_query($conn, $new_sql)) {
//         //success
//     } else {
//         echo 'query error: ' . mysqli_error($conn);
//     }
// }

// //whatever is the input change the database accordingly for the color 
// if (isset($_POST['change-color'])) {
//     if (isset($_POST['red'])) {
//         $new_value = mysqli_real_escape_string($conn, 'red');
//         $new_sql = "UPDATE device SET lightColor = '$new_value'";
//         mysqli_query($conn, $new_sql);
//     } else if (isset($_POST['blue'])) {
//         $new_value = mysqli_real_escape_string($conn, 'blue');
//         $new_sql = "UPDATE device SET lightColor = '$new_value'";
//         mysqli_query($conn, $new_sql);
//     } else if (isset($_POST['green'])) {
//         $new_value = mysqli_real_escape_string($conn, 'green');
//         $new_sql = "UPDATE device SET lightColor = '$new_value'";
//         mysqli_query($conn, $new_sql);
//     }
// }

// //whatever is the input change the database accordingly for the security
// if (isset($_POST['security'])) {
//     if (isset($_POST['low'])) {
//         $new_value = mysqli_real_escape_string($conn, 'low');
//         $new_sql = "UPDATE device SET securityS = '$new_value'";
//         mysqli_query($conn, $new_sql);
//     } else if (isset($_POST['off'])) {
//         $new_value = mysqli_real_escape_string($conn, 'off');
//         $new_sql = "UPDATE device SET securityS = '$new_value'";
//         mysqli_query($conn, $new_sql);
//     } else if (isset($_POST['high'])) {
//         $new_value = mysqli_real_escape_string($conn, 'high');
//         $new_sql = "UPDATE device SET securityS = '$new_value'";
//         mysqli_query($conn, $new_sql);
//     }
// }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHome-Producer</title>
    <link rel="stylesheet" href="producer-styles.css">
    <script src="producer.js" defer></script>
</head>

<body>
<div class="header">
        <h1>Producer Dashboard</h1>
    </div>
    <div class="cards">
        <div class="card lights">
            <p class="title">LIGHTS</p>
            <p class="state" data-state="off">OFF</p>
            <form action="" class="light-control" method="post">
                <button type="submit" name="light">TURN ON</button>
            </form>
        </div>
        <div class="card colors">
            <p class="title">LIGHT COLOR</p>
            <p class="state" data-state="green">GREEN</p>
            <form action="" class="color-control" method="post">
                <div>
                    <label for="red">RED</label>
                    <input type="radio" name="red" id="red">
                </div>
                <div>
                    <label for="green">GREEN</label>
                    <input type="radio" name="green" id="green">
                </div>
                <div>
                    <label for="blue">BLUE</label>
                    <input type="radio" name="blue" id="blue">
                </div>
                <button type="submit" name="change-color">APPLY CHANGES</button>
            </form>
        </div>
        <div class="card temp">
            <p class="title">DESIRED TEMPERATURE</p>
            <form action="" method="post"
                style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px;">
                <div class="temp-control">
                    <button class="minus">-</button>
                    <p class="state" data-value="45">45 C°</p>
                    <button class="plus">+</button>
                </div>
                <button type="submit" name="air">START AIR CONDITIONER</button>
            </form>
        </div>
        <div class="card sound">
            <p class="title">SOUND SYSTEM</p>
            <p class="state">ON</p>
            <form action="" method="post">
                <button type="submit" name="sound">TURN OFF</button>
            </form>
        </div>
        <div class="card security">
            <p class="title">SECURITY</p>
            <form action="" class="security-control" method="post">
                <div> <label for="low">LOW</label>
                    <input type="radio" name="low" id="low">
                </div>
                <div> <label for="high">HIGH</label>
                    <input type="radio" name="high" id="high">
                </div>
                <div> <label for="off">OFF</label>
                    <input type="radio" name="off" id="off">
                </div>
                <button type="submit" name="security">APPLY CHANGES</button>
            </form>
        </div>
        <div class="card lock">
            <p class="title">DOOR LOCK</p>
            <p class="state">LOCKED</p>
            <form action="" method="post">
                <button type="submit" name="lock">UNLOCK</button>
            </form>
        </div>
        <div class="card roomba">
            <p class="title">ROOMBA</p>
            <p class="state">CLEANING</p>
            <form action="" method="post">
                <button type="submit" name="roomba">STOP</button>
            </form>
        </div>
        <div class="card heater">
            <p class="title">WATER HEATER</p>
            <p class="state">ON</p>
            <form action="" method="post">
                <button type="submit" name="heater">TURN OFF</button>
            </form>
        </div>
    </div>
</body>

</html>
