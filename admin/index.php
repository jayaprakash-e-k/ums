<?php

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != "admin") {
    header("Location: ../loginForm.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['user_name']; ?>!</h1>

    <a href="../logout.php">Logout</a>
</body>
</html>