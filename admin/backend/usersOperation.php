<?php

include "../../config.php";

if (isset($_GET['op'])  && $_GET['op'] == "delete" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE ID='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../userList.php?msg=delsuc");
    } else {
        header("Location: ../userList.php?msg=delfail");
    }
}

if (isset($_POST['op']) && $_POST['op'] == "add") {
    $name = $_POST['name'];
    $email = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $pass = password_hash($pass, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM users WHERE EMAIL='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../userList.php?msg=emailexist");
        exit();
    }

    $sql = "INSERT INTO users (NAME, EMAIL, PASS, ROLE) VALUES ('$name', '$email', '$pass', '$role')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../userList.php?msg=addsuc");
    } else {
        header("Location: ../userList.php?msg=addfail");
    }
}

if (isset($_POST['op']) && $_POST['op'] == "update" && $_POST['userID']) {

    $id = $_POST['userID'];

    $name = $_POST['name'];
    $email = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $pass = password_hash($pass, PASSWORD_BCRYPT);

    $sql = "UPDATE users SET NAME='$name', EMAIL='$email', PASS='$pass', ROLE='$role' WHERE ID='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../userList.php?msg=updatesuc");
    } else {
        header("Location: ../userList.php?msg=updatefail");
    }
}
