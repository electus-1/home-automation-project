<?php
$email = $_GET['variable'];
$room = $_GET['variable2'];

//set the time zone
date_default_timezone_set('Europe/Istanbul');

//echo ($email . " and " . $room);
$conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

//write query for all infos
$sql = "SELECT * FROM {$room} WHERE email = '{$email}'";

$columnNames = "SELECT *
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_NAME = N'{$room}'";

$result2 = mysqli_query($conn, $columnNames);
$infos2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$columns[] = '';

for ($i = 0; $i < count($infos2) - 1; $i++) {
    $columns[$i] = $infos2[$i]['COLUMN_NAME'];
}
//print_r($columns);
//print_r($infos2);

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

//frees result from memory for good practice
mysqli_free_result($result);
mysqli_free_result($result2);

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


/*For all the if statements below, if a certain button is pressed then update the database */

// If the button is clicked, update the database
//mysqli_real_escape_string secures the input we want to send to the data base
if (isset($_POST['light'])) {
    //if light is 1 then val is 0 and vice versa
    $val = '';
    ($light == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);
    $finalValue = "";

    for ($i = 0; $i < count($columns); $i++) {

        if (${$columns[$i]} !== null) {

            if ($columns[$i] == 'lightColor' || $columns[$i] == 'securityS' || $columns[$i] == 'email') {
                $finalValue .= ", '" .  ${$columns[$i]} . "' ";
            } else if ($columns[$i] == 'light') {
                $finalValue .= ", " . $new_value;
            } else {
                $finalValue .= ", " . ${$columns[$i]};
            }
        } else {
            $finalValue .= ", null";
        }
    }

    $finalValue = substr($finalValue, 1);


    $date = date('m/d/Y h:i:s a', time());

    $new_sql = "INSERT INTO {$room} VALUES ({$finalValue}, '{$date}')";
    //$new_sql = "UPDATE device SET light = '$new_value'";
    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header("Location: ./customer_room.php?variable2={$room}&variable={$email}");
}

if (isset($_POST['sound'])) {
    $val = '';
    ($sound == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);

    $finalValue = "";

    for ($i = 0; $i < count($columns); $i++) {

        if (${$columns[$i]} !== null) {

            if ($columns[$i] == 'lightColor' || $columns[$i] == 'securityS' || $columns[$i] == 'email') {
                $finalValue .= ", '" .  ${$columns[$i]} . "'";
            } else if ($columns[$i] == 'sound') {
                $finalValue .= ", " .  $new_value;
            } else {
                $finalValue .= ", " . ${$columns[$i]};
            }
        } else {
            $finalValue .= ", null";
        }
    }

    $finalValue = substr($finalValue, 1);

    $date = date('m/d/Y h:i:s a', time());

    $new_sql = "INSERT INTO {$room} VALUES ({$finalValue}, '{$date}')";
    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header("Location: ./customer_room.php?variable2={$room}&variable={$email}");
}


if (isset($_POST['lock'])) {

    $val = '';
    ($door == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);


    $finalValue = "";

    for ($i = 0; $i < count($columns); $i++) {

        if (${$columns[$i]} !== null) {
            if ($columns[$i] == 'lightColor' || $columns[$i] == 'securityS' || $columns[$i] == 'email') {
                $finalValue .= ", '" .  ${$columns[$i]} . "'";
            } else if ($columns[$i] == 'door') {
                $finalValue .= ", " .  $new_value;
            } else {
                $finalValue .= ", " . ${$columns[$i]};
            }
        } else {
            $finalValue .= ", null";
        }
    }

    $finalValue = substr($finalValue, 1);


    $date = date('m/d/Y h:i:s a', time());

    $new_sql = "INSERT INTO {$room} VALUES ({$finalValue}, '{$date}')";

    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header("Location: ./customer_room.php?variable2={$room}&variable={$email}");
}

if (isset($_POST['roomba'])) {
    $val = '';
    ($roomba == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);

    $finalValue = "";

    for ($i = 0; $i < count($columns); $i++) {

        if (${$columns[$i]} !== null) {
            if ($columns[$i] == 'lightColor' || $columns[$i] == 'securityS' || $columns[$i] == 'email') {
                $finalValue .= ", '" .  ${$columns[$i]} . "'";
            } else if ($columns[$i] == 'roomba') {
                $finalValue .= ", " .  $new_value;
            } else {
                $finalValue .= ", " . ${$columns[$i]};
            }
        } else {
            $finalValue .= ", null";
        }
    }

    $finalValue = substr($finalValue, 1);

    $date = date('m/d/Y h:i:s a', time());

    $new_sql = "INSERT INTO {$room} VALUES ({$finalValue}, '{$date}')";

    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header("Location: ./customer_room.php?variable2={$room}&variable={$email}");
}

if (isset($_POST['heater'])) {
    $val = '';
    ($waterHeater == 1) ? $val = 0 : $val = 1;

    $new_value = mysqli_real_escape_string($conn, $val);

    $finalValue = "";

    for ($i = 0; $i < count($columns); $i++) {

        if (${$columns[$i]} !== null) {
            if ($columns[$i] == 'lightColor' || $columns[$i] == 'securityS' || $columns[$i] == 'email') {
                $finalValue .= ", '" .  ${$columns[$i]} . "'";
            } else if ($columns[$i] == 'waterHeater') {
                $finalValue .= ", " .  $new_value;
            } else {
                $finalValue .= ", " . ${$columns[$i]};
            }
        } else {
            $finalValue .= ", null";
        }
    }

    $finalValue = substr($finalValue, 1);

    $date = date('m/d/Y h:i:s a', time());

    $new_sql = "INSERT INTO {$room} VALUES ({$finalValue}, '{$date}')";

    if (mysqli_query($conn, $new_sql)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    //refresh the page to relod the database
    header("Location: ./customer_room.php?variable2={$room}&variable={$email}");
}

//whatever is the input change the database accordingly for the color 
if (isset($_POST['change-color'])) {
    $selectedColor = $_POST['colorlist'];

    // Update the database with the selected color
    $new_value = mysqli_real_escape_string($conn, $selectedColor);


    $finalValue = "";

    for ($i = 0; $i < count($columns); $i++) {
        if (${$columns[$i]} !== null) {
            if ($columns[$i] == 'securityS' || $columns[$i] == 'email') {
                $finalValue .= ", '" .  ${$columns[$i]} . "'";
            } else if ($columns[$i] == 'lightColor') {
                $finalValue .= ", '" .  $new_value . "'";
            } else {
                $finalValue .= ", " . ${$columns[$i]};
            }
        } else {
            $finalValue .= ", null";
        }
    }

    $finalValue = substr($finalValue, 1);

    $date = date('m/d/Y h:i:s a', time());

    $new_sql = "INSERT INTO {$room} VALUES ({$finalValue}, '{$date}')";

    mysqli_query($conn, $new_sql);

    echo ('Button pushed');

    //refresh the page to relod the database
    header("Location: ./customer_room.php?variable2={$room}&variable={$email}");
}

//whatever is the input change the database accordingly for the security
if (isset($_POST['security'])) {
    $selectedSec = $_POST['sec'];

    // Update the database with the selected security option
    $new_value = mysqli_real_escape_string($conn, $selectedSec);

    $finalValue = "";

    for ($i = 0; $i < count($columns); $i++) {
        if (${$columns[$i]} !== null) {
            if ($columns[$i] == 'lightColor' || $columns[$i] == 'email') {
                $finalValue .= ", '" .  ${$columns[$i]} . "'";
            } else if ($columns[$i] == 'securityS') {
                $finalValue .= ", '" .  $new_value . "'";
            } else {
                $finalValue .= ", " . ${$columns[$i]};
            }
        } else {
            $finalValue .= ", null";
        }
    }

    $finalValue = substr($finalValue, 1);

    $date = date('m/d/Y h:i:s a', time());

    $new_sql = "INSERT INTO {$room} VALUES ({$finalValue}, '{$date}')";

    mysqli_query($conn, $new_sql);

    //refresh the page to relod the database
    header("Location: ./customer_room.php?variable2={$room}&variable={$email}");
}

if (isset($_POST['air'])) {
    $selectedDeg = $_POST['temp'];

    // Update the database with the entered value
    $new_value = mysqli_real_escape_string($conn, $selectedDeg);

    $finalValue = "";

    for ($i = 0; $i < count($columns); $i++) {
        if (${$columns[$i]} !== null) {
            if ($columns[$i] == 'lightColor' || $columns[$i] == 'securityS' || $columns[$i] == 'email') {
                $finalValue .= ", '" .  ${$columns[$i]} . "'";
            } else if ($columns[$i] == 'tempature') {
                $finalValue .= ", " .  $new_value;
            } else {
                $finalValue .= ", " . ${$columns[$i]};
            }
        } else {
            $finalValue .= ", null";
        }
    }

    $finalValue = substr($finalValue, 1);

    $date = date('m/d/Y h:i:s a', time());

    $new_sql = "INSERT INTO {$room} VALUES ({$finalValue}, '{$date}')";
    mysqli_query($conn, $new_sql);

    //refresh the page to relod the database
    header("Location: ./customer_room.php?variable2={$room}&variable={$email}");
}
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
        <h1><?php echo (ucfirst($room)); ?></h1>

        <?php
        //goes back and passes the email
        echo ("<a href='./table_device.php?variable={$email}&variable2={$room}'>Device Info</a>");
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
                <form onsubmit="submitColor " action="" class="color-control" method="post">
                    <select name="colorlist" id="colorlist">
                        <option value="red">RED</option>
                        <option value="green">GREEN</option>
                        <option value="blue">BLUE</option>
                    </select>
                    <button type="submit" name="change-color">APPLY CHANGES</button>


                </form>
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

                    echo "<div class='airtemp'  data-value='{$tempature}'></div>";
                    ?>
                </p>

                <script>
                    //this script controls dynamic data values
                    //get random number between max and min
                    function getRandomArbitrary(min, max) {
                        return Math.random() * (+max - +min) + +min;
                    }

                    function refresh() {

                        let temp = div.getAttribute('data-value');
                        console.log('Temp: ' + temp);
                        let randomNumber = getRandomArbitrary((temp - 2), (+temp + 3));
                        //raounds the number to 2 decimal place
                        div.textContent = (Math.round(randomNumber * 100) / 100).toFixed(2);
                    }

                    const div = document.querySelector('.airtemp');

                    let temp = div.getAttribute('data-value');
                    console.log('Temp: ' + temp);
                    let randomNumber = getRandomArbitrary((temp - 2), (+temp + 3));
                    //raounds the number to 2 decimal place
                    div.textContent = (Math.round(randomNumber * 100) / 100).toFixed(2);

                    //run resresh every x ms
                    setInterval(refresh, 2000);
                </script>

                <form action="" method="post" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px;">
                    <div class="temp-control">
                        <input type="number" required name="temp" min="8" max="38" value="8" step=".01">
                    </div>
                    <button type="submit" name="air">START AIR CONDITIONER</button>

                </form>
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
                <form action="" class="security-control" method="post">
                    <select name="sec" id="sec">
                        <option value="low">LOW</option>
                        <option value="high">HIGH</option>
                        <option value="off">OFF</option>
                    </select>
                    <button type="submit" name="security">APPLY CHANGES</button>
                </form>
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
        <?php
                }

                if ($waterHeater !== null) {
        ?>
            <div class="card heater">
                <p class="title">WATER HEATER</p>
                <p class="state fix2">
                    <?php
                    if ($waterHeater == 0) {
                        echo '<img src="../img/display/heating-off.png" width="50px" height="50px" img/> </br>';

                        echo 'OFF';
                    } else {
                        echo '    <img class="fix" src="../img/display/heating-on.png" width="50px" height="50px" img/> </br>';

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
        <?php
                }
        ?>

    </div>


</body>

</html>