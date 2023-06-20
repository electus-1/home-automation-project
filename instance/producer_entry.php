<?php
$email = $_GET['variable'];


$conn = mysqli_connect('localhost', 'algos', '123456', 'dbtest');

//write query for all infos
$sql = 'SELECT email, pw, isAdmin FROM pinfo';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infos = mysqli_fetch_all($result, MYSQLI_ASSOC);



//frees result from memory for good practice
mysqli_free_result($result);

if ($email !== null) {
    $sqldelete = "DELETE FROM pinfo WHERE email = '{$email}'";
    if (mysqli_query($conn, $sqldelete)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
    header("Location: ./producer_entry.php");
}
//print_r($infos);

if (isset($_POST['login'])) {
    $newEmail = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $newPw = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sqlNewCus = "INSERT INTO pinfo VALUES ('{$newEmail}', {$newPw}, 0)";
    echo $sqlNewCus;

    if (mysqli_query($conn, $sqlNewCus)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    $userInfoUpdate = "INSERT INTO userInfo VALUES ('{$newEmail}', 0, 0, 0, 0, 0, 0)";

    if (mysqli_query($conn, $userInfoUpdate)) {
        //success
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }

    header("Location: ./producer_entry.php");
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
        <h1>Producer Dashboard</h1>
        <a href="" class="add-customer-link">Add Customer</a>
        <a href="../index.html">Logout</a>

    </div>


    <div class="table">
        <table>
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Select</th>
                <th>Delete</th>
            </tr>

            <?php
            for ($i = 0; $i < count($infos); $i++) {
                if ($infos[$i]['isAdmin'] == 0) {
                    echo (" <tr>
                <td>{$infos[$i]['email']}</td>
                <td>{$infos[$i]['pw']}</td>
                <td><a href='./producer_rooms.php?variable={$infos[$i]['email']}'><button class='probttn' type='submit'>Select</button></a></td>
                <td><a href='./producer_entry.php?variable={$infos[$i]['email']}'<form action='' 
                method='post'><button type='submit' name='delete' class='probttn' type='submit'>Delete</button></form></a></td>
            </tr> ");
                }
            }
            ?>

        </table>
    </div>

    <div class="modal-wrapper">
        <form class="modal" action="" method="POST">
            <span class="close">&times;</span>
            <label for="email">New Customer Mail:</label>
            <input type="email" id="email" name="email" placeholder="yourmail@example.com" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="********" required>
            <button type="submit" name="login" class="sign-up">Add</button>
        </form>
    </div>


</body>

</html>