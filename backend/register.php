<?php

include "../config.php";

$name = $_POST['name'];
$username = $_POST['username'];
$pass = $_POST['password'];

$pass = password_hash($pass, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (NAME, EMAIL, PASS) VALUES ('$name', '$username', '$pass')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Data inserted successfully!";
} else {
    echo "Data insertion failed!";
}
?>