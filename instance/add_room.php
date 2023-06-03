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

    for ($i = 0; $i < count($checkboxes); $i++) {
        $room .= "$checkboxes[$i] = 0, ";
    }

    $room = rtrim($room, ", ");
    echo ($room);


    $addDevice = "UPDATE {$chosenRoom} SET {$room}  WHERE email = '{$email}'";

    echo ($addDevice);

    if (mysqli_query($conn, $addDevice)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
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
        <h1>Add a room</h1>
        <a href="../index.html">Logout</a>
        <?php
        echo ("<a href='./customer_entry.php?variable={$email}'>Back</a>"); ?>



    </div>

    <div class="room-form">
        <form action="" method="post">

            <label for="room-type">Room type</label>
            <select name="room-type" id="room-type">
                <option value="kitchen" selected>Kitchen</option>
                <option value="livingroom">Living Room</option>
                <option value="hallway">Hallway</option>
                <option value="bathroom">Bathroom</option>
                <option value="bedroom">Bedroom</option>
                <option value="emptyroom">Empty Room</option>
            </select>

            <br>

            <label for="devices">Choose Devices: </label>
            <div id="devices">
                <label for="light">Light Sensor</label>
                <input type="checkbox" value="light" name="box[]" id="light">
                <br>
                <label for="lightColor">Light Color Sensor</label>
                <input type="checkbox" value="lightColor" name="box[]" id="lightColor">
                <br>
                <label for="tempature">Temperature Capturer</label>
                <input type="checkbox" value="tempature" name="box[]" id="tempature">
                <br>
                <label for="sound">Sound System</label>
                <input type="checkbox" value="sound" name="box[]" id="sound">
                <br>
                <label for="securityS">Security System </label>
                <input type="checkbox" value="securityS" name="box[]" id="securityS">
                <br>
                <label for="door">Door Locking Mechanism </label>
                <input type="checkbox" value="door" name="box[]" id="door">
                <br>
                <label for="roomba">Roomba Cleaner</label>
                <input type="checkbox" value="roomba" name="box[]" id="roomba">
                <br>
                <label for="waterHeater">Water Heating System</label>
                <input type="checkbox" value="waterHeater" name="box[]" id="waterHeater">
                <br>
            </div>

            <button name="addRoom" type="submit">Add</button>

        </form>
    </div>
</body>

</html>