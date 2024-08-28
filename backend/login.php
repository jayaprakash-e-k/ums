<?php

include "../config.php";

$username = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `EMAIL`='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $user = mysqli_fetch_assoc($result);

    if (password_verify($pass, $user['PASS'])) {
        echo "Logged in!";
    } else {
        echo "Username or Password Incorrect!";
    }
} else {
    echo "Username or Password Incorrect!";
}

?>