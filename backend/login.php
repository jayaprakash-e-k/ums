<?php

include "../config.php";

$username = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `EMAIL`='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $user = mysqli_fetch_assoc($result);

    if (password_verify($pass, $user['PASS'])) {
        $role = $user['ROLE'];
        session_start();

        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_name'] = $user['NAME'];
        $_SESSION['user_email'] = $user['EMAIL'];
        $_SESSION['user_role'] = $user['ROLE'];
        
        if ($role == "user") {
            header("Location: ../user/index.php");
        } else if ($role == "admin"){
            header("Location: ../admin/index.php");
        } else {
            echo "Role not defined";
        }
        exit();
    } else {
        echo "Username or Password Incorrect!";
    }
} else {
    echo "Username or Password Incorrect!";
}

?>