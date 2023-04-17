<!DOCTYPE php>
<?php
$conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

//write query for all infos
$sql = 'SELECT light, lightColor, tempature, sound, securityS, door, roomba, waterHeater FROM device';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);

//frees result from memory for good practice
mysqli_free_result($result);

print_r($infos);
?>

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
    </div>
    <div class="cards">
        <div class="card">
            <p class="title">LIGHTS</p>
            <p class="state">OFF</p>
            <form action="" class="light-control" method="post">
                <button type="submit" name="light">TURN ON</button>
            </form>
        </div>
        <div class="card">
            <p class="title">LIGHT COLOR</p>
            <p class="state">GREEN</p>
            <form action="" class="color-control" method="post">
                <div>
                    <label for="red">RED</label>
                    <input type="radio" name="color" id="red">
                </div>
                <div>
                    <label for="green">GREEN</label>
                    <input type="radio" name="color" id="green">
                </div>
                <div>
                    <label for="blue">BLUE</label>
                    <input type="radio" name="color" id="blue">
                </div>
                <button type="submit" name="change-color">APPLY CHANGES</button>
            </form>
        </div>
        <div class="card">
            <p class="title">DESIRED TEMPERATURE</p>
            <form action="" method="post"
                style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px;">
                <div class="temp-control">
                    <button>-</button>
                    <p class="state" data-value="45">45 C°</p>
                    <button>+</button>
                </div>
                <button type="submit" name="air">START AIR CONDITIONER</button>
            </form>
        </div>
        <div class="card">
            <p class="title">SOUND SYSTEM</p>
            <p class="state">ON</p>
            <form action="" method="post">
                <button type="submit" name="sound">TURN OFF</button>
            </form>
        </div>
        <div class="card">
            <p class="title">SECURITY</p>
            <form action="" class="security-control" method="post">
                <div> <label for="low">LOW</label>
                    <input type="radio" name="security-level" id="low">
                </div>
                <div> <label for="high">HIGH</label>
                    <input type="radio" name="security-level" id="high">
                </div>
                <div> <label for="off">OFF</label>
                    <input type="radio" name="security-level" id="off">
                </div>
                <button type="submit" name="security">APPLY CHANGES</button>
            </form>
        </div>
        <div class="card">
            <p class="title">DOOR LOCK</p>
            <p class="state">LOCKED</p>
            <form action="" method="post">
                <button type="submit" name="lock">UNLOCK</button>
            </form>
        </div>
        <div class="card">
            <p>ROOMBA</p>
            <p>CLEANING</p>
            <form action="" method="post">
                <button type="submit" name="roomba">STOP</button>
            </form>
        </div>
        <div class="card">
            <p>WATER HEATER</p>
            <p>ON</p>
            <form action="" method="post">
                <button type="submit">TURN OFF</button>
            </form>
        </div>
    </div>
</body>

</html>
