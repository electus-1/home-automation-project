<?php
$email = $_GET['variable'];
$conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

//write query for all infos
$sql = "SELECT email, kitchen, livingroom, hallway, bathroom, bedroom, emptyroom FROM userInfo WHERE email = '$email'";

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

//frees result from memory for good practice
mysqli_free_result($result);

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

if (isset($_POST['addRoom'])) {
    $checkboxes = $_POST['box'];
    $chosenRoom = $_POST['room-type'];

    $addRoom = "UPDATE userInfo SET {$chosenRoom} = 1 WHERE email = '{$email}'";

    if (mysqli_query($conn, $addRoom)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    $room = '';
    $vals = '';

    for ($i = 0; $i < count($checkboxes); $i++) {
        $room .= "$checkboxes[$i], ";
        if ($checkboxes[$i] == 'lightColor') {
            $vals .= "'red',";
        } else if ($checkboxes[$i] == 'securityS') {
            $vals .= "'low',";
        } else {
            $vals .= "0,";
        }
    }



    $room = rtrim($room, ", ");
    //echo ($room);


    date_default_timezone_set('Europe/Istanbul');

    $date = date('m/d/Y h:i:s a', time());

    $addDevice = "INSERT INTO {$chosenRoom} ({$room}, email, inputDate) VALUES({$vals} '{$email}', '{$date}')";

    echo $addDevice;
    if (mysqli_query($conn, $addDevice)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    header("Location: ./customer_entry.php?variable={$email}");
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
    <div class="header add-room-header">
        <h1>Add a room</h1>

        <?php
        echo ("<a href='./customer_entry.php?variable={$email}'>Back</a>"); ?>

        <a href="../index.html">Logout</a>

    </div>

    <div class="room-form">
        <form action="" method="post">
            <div id="room-selection"><label for="room-type">Room type: </label>
                <select name="room-type" id="room-type">
                    <option value="kitchen" selected>Kitchen</option>
                    <option value="livingroom">Living Room</option>
                    <option value="hallway">Hallway</option>
                    <option value="bathroom">Bathroom</option>
                    <option value="bedroom">Bedroom</option>
                    <option value="emptyroom">Empty Room</option>
                </select>
            </div>

            <br>

            <div id="devices">

                <label for="devices">Choose Devices: </label>
                <br>
                <div>
                    <label for="light">Light Sensor</label>
                    <input type="checkbox" value="light" name="box[]" id="light">
                </div>
                <br>
                <div> <label for="lightColor">Light Color Sensor</label>
                    <input type="checkbox" value="lightColor" name="box[]" id="lightColor">
                </div>
                <br>
                <div>
                    <label for="tempature">Temperature Capturer</label>
                    <input type="checkbox" value="tempature" name="box[]" id="tempature">
                </div>
                <br>
                <div><label for="sound">Sound System</label>
                    <input type="checkbox" value="sound" name="box[]" id="sound">
                </div>
                <br>
                <div>
                    <label for="securityS">Security System </label>
                    <input type="checkbox" value="securityS" name="box[]" id="securityS">
                </div>
                <br>
                <div>
                    <label for="door">Door Locking Mechanism </label>
                    <input type="checkbox" value="door" name="box[]" id="door">
                </div>

                <br>
                <div>
                    <label for="roomba">Roomba Cleaner</label>
                    <input type="checkbox" value="roomba" name="box[]" id="roomba">
                </div>

                <br>
                <div> <label for="waterHeater">Water Heating System</label>
                    <input type="checkbox" value="waterHeater" name="box[]" id="waterHeater">
                </div>

                <br>
            </div>

            <button name="addRoom" type="submit">Add</button>

        </form>
    </div>
</body>

</html>