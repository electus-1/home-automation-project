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

//echo ($email);
//print_r($infos);

if (isset($_POST['delete'])) {
    $value = $_POST['delete'];
    $sqlcode = "UPDATE userInfo SET {$value} = 0 WHERE email = '{$email}'";
    echo ($sqlcode);

    if (mysqli_query($conn, $sqlcode)) {
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
    <title>AutoHome-Customer</title>
    <link rel="stylesheet" href="../styles/customer-entry-styles.css">
    <script src="../script/producer.js" defer></script>
    <script src="../script/displayCustomer.js" defer></script>
</head>

<body>
    <div class="header">
        <h1>Customer Dashboard</h1>
        <a href="../index.html">Logout</a>
    </div>



    <div class="cards">
        <?php
        if ($livingroom != 0) {
            for ($i = 0; $i < $livingroom; $i++) {
                echo (" <a href='./customer_room.php?variable2=livingroom&variable={$email}'> <div class='card living-room'>
                <p class='title'>Living Room</p>
        <img src='../img/display/livingroom.png' alt=''>

        <form action='' method='post'>
        <button name='delete' value='livingroom'>DELETE</button>
    </form>
            </div>
            
            </a>
            ");
            }
        }

        if ($kitchen != 0) {
            for ($i = 0; $i < $kitchen; $i++) {
                echo (" <a href='./customer_room.php?variable2=kitchen&variable={$email}'><div class='card kitchen'>
                <p class='title'>Kitchen</p>
        <img src='../img/display/kitchen.png' alt=''>

        <form action='' method='post'>
        <button name='delete' value='kitchen'>DELETE</button>
    </form>

            </div></a>");
            }
        }

        if ($bathroom != 0) {
            for ($i = 0; $i < $bathroom; $i++) {
                echo (" <a href='./customer_room.php?variable2=bathroom&variable={$email}'><div class='card bathroom'>
                <p class='title'>Bathroom</p>
        <img src='../img/display/bathroom.png' alt=''>

        <form action='' method='post'>
        <button name='delete' value='bathroom'>DELETE</button>
    </form>

            </div></a>");
            }
        }

        if ($hallway != 0) {
            for ($i = 0; $i < $hallway; $i++) {
                echo ("  <a href='./customer_room.php?variable2=hallway&variable={$email}'><div class='card hallway'>
                <p class='title'>Hallway</p>
        <img src='../img/display/hallway.png' alt=''>

        <form action='' method='post'>
        <button name='delete' value='hallway'>DELETE</button>
    </form>

            </div></a>");
            }
        }

        if ($bedroom != 0) {
            for ($i = 0; $i < $bedroom; $i++) {
                echo (" <a href='./customer_room.php?variable2=bedroom&variable={$email}'> <div class='card bedroom'>
                <p class='title'>Bedroom</p>
        <img src='../img/display/bedroom.png' alt=''>

        <form action='' method='post'>
        <button name='delete' value='bedroom'>DELETE</button>
    </form>

            </div></a>");
            }
        }

        if ($emptyroom != 0) {
            for ($i = 0; $i < $emptyroom; $i++) {
                echo (" <a href='./customer_room.php?variable2=emptyroom&variable={$email}'> <div class='card emptyroom'>
                <p class='title'>Empty Room</p>
        <img src='../img/display/emptyroom.png' alt=''>

        <form action='' method='post'>
        <button name='delete' value='emptyroom'>DELETE</button>
    </form>
                
            </div></a>");
            }
        }



        ?>

        <?php
        echo ("<div class='card emptyroom'>
        <a href='./add_room.php?variable={$email}'>
            <p class='title'>Add/Edit</p>
        <img src='../img/display/plus.png' alt=''>
        </a>
    </div>");
        ?>

    </div>
</body>

</html>