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

$livingroom = $infos[0]['livingroom'];
$kitchen = $infos[0]['kitchen'];
$hallway = $infos[0]['hallway'];
$bathroom = $infos[0]['bathroom'];
$bedroom = $infos[0]['bedroom'];
$emptyroom = $infos[0]['emptyroom'];

//get the email from the login.php file to know specific user's infos

echo ($email);
print_r($infos);

?>

<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoHome-Customer</title>
    <link rel="stylesheet" href="../styles/customer-entry-styles.css">
    <script src="../script/producer.js" defer></script>
    <script src="../script/displayCustomer.js" defer></script>
</head>

<body>
    <div class="header">
        <h1><?php echo ("{$email}'s Dashboard"); ?></h1>
        <a href="../index.html">Logout</a>
        <a href="./producer_entry.php">Back</a>

    </div>
    <div class="cards">
        <?php
        if ($livingroom != 0) {
            for ($i = 0; $i < $livingroom; $i++) {
                echo (" <a href='./producer_cus_room.php?variable2=livingroom&variable={$email}'> <div class='card living-room'>
                <p class='title'>Living Room</p>
                </a>
            </div>");
            }
        }

        if ($kitchen != 0) {
            for ($i = 0; $i < $kitchen; $i++) {
                echo (" <a href='./producer_cus_room.php?variable2=kitchen&variable={$email}'><div class='card kitchen'>
                <p class='title'>Kitchen</p>
            </div></a>");
            }
        }

        if ($bathroom != 0) {
            for ($i = 0; $i < $bathroom; $i++) {
                echo (" <a href='./producer_cus_room.php?variable2=bathroom&variable={$email}'><div class='card bathroom'>
                <p class='title'>Bathroom</p>
            </div></a>");
            }
        }

        if ($hallway != 0) {
            for ($i = 0; $i < $hallway; $i++) {
                echo ("  <a href='./producer_cus_room.php?variable2=hallway&variable={$email}'><div class='card hallway'>
                <p class='title'>Hallway</p>
            </div></a>");
            }
        }

        if ($bedroom != 0) {
            for ($i = 0; $i < $bedroom; $i++) {
                echo (" <a href='./producer_cus_room.php?variable2=bedroom&variable={$email}'> <div class='card bedroom'>
                <p class='title'>Bedroom</p>
            </div></a>");
            }
        }

        if ($emptyroom != 0) {
            for ($i = 0; $i < $emptyroom; $i++) {
                echo (" <a href='./producer_cus_room.php?variable2=emptyroom&variable={$email}'> <div class='card emptyroom'>
                <p class='title'>Empty Room</p>
            </div></a>");
            }
        }



        ?>

    </div>
</body>

</html>