<?php
$email = $_GET['variable'];
$room = $_GET['variable2'];

$conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

//write query for all infos
$sql = "SELECT * FROM {$room} WHERE email = '{$email}'";

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

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



//frees result from memory for good practice
mysqli_free_result($result);

//print_r($infos);
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
        <h1>Device <?php echo ("{$room}"); ?></h1>

        <?php
        //goes back and passes the email
        echo ("<a href='./customer_room.php?variable={$email}&variable2={$room}'>Back</a>"); ?>
        <a href="../index.html">Logout</a>
    </div>

    <div class="table">
        <table>
            <tr>
                <th>Light System</th>
                <th>Light Color</th>
                <th>Temperature (℃)</th>
                <th>Sound System</th>
                <th>Security System</th>
                <th>Lock</th>
                <th>Roomba</th>
                <th>Water Heater</th>
            </tr>

            <?php
            for ($i = 0; $i < count($infos); $i++) {
                if ($infos[$i]['isAdmin'] == 0) {

                    echo ("<tr>");

                    if ($infos[$i]['light'] == null) {
                        echo ("<td>No device found</td>");
                    } else if ($infos[$i]['light'] == 0) {
                        echo ("<td>OFF</td>");
                    } else {
                        echo ("<td>ON</td>");
                    }

                    if ($infos[$i]['lightColor'] == 0 || $infos[$i]['lightColor'] == null) {
                        echo ("<td>No device found</td>");
                    } else {
                        echo ("<td>{$infos[$i]['lightColor']}</td>");
                    }

                    if ($infos[$i]['tempature'] == null) {
                        echo ("<td>No device found</td>");
                    } else {
                        echo ("<td>{$infos[$i]['tempature']}</td>");
                    }

                    if ($infos[$i]['sound'] == null) {
                        echo ("<td>No device found</td>");
                    } else if ($infos[$i]['sound'] == 0) {
                        echo ("<td>OFF</td>");
                    } else {
                        echo ("<td>ON</td>");
                    }

                    if ($infos[$i]['securityS'] == 0 || $infos[$i]['securityS'] == null) {
                        echo ("<td>No device found</td>");
                    } else {
                        echo ("<td>{$infos[$i]['securityS']}</td>");
                    }

                    if ($infos[$i]['door'] == null) {
                        echo ("<td>No device found</td>");
                    } else if ($infos[$i]['door'] == 0) {
                        echo ("<td>OFF</td>");
                    } else {
                        echo ("<td>ON</td>");
                    }

                    if ($infos[$i]['roomba'] == null) {
                        echo ("<td>No device found</td>");
                    } else if ($infos[$i]['door'] == 0) {
                        echo ("<td>Charging</td>");
                    } else {
                        echo ("<td>Cleaning</td>");
                    }

                    if ($infos[$i]['roomba'] == null) {
                        echo ("<td>No device found</td>");
                    } else if ($infos[$i]['waterHeater'] == 0) {
                        echo ("<td>OFF</td>");
                    } else {
                        echo ("<td>Heating Water</td>");
                    }
                }
                echo ("<tr>");
            }
            ?>
        </table>
    </div>
</body>

</html>