<?php

session_start();

include "../config.php";

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != "admin") {
    header("Location: ../loginForm.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "../head.php"; ?>

    <title>User List</title>
</head>

<body>

    <form action="./backend/usersOperation.php" method="post" style="width: min(90%, 500px);" class="mb-3 mx-auto" id="userForm">
        <h2>Add User</h2>
        <input type="hidden" name="op" value="add" id="op">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Jp" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Email address</label>
            <input type="email" name="username" class="form-control" id="username" placeholder="name@example.com" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="*********" required>
                <span class="input-group-text" id="show-pass" onclick="showPass()"><i class="fa-regular fa-eye"></i></span>
            </div>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>


    <table class="table table-striped">
        <tr>
            <th>S.no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr id='data-{$row['ID']}'>
                        <td>$i</td>
                        <td>{$row['NAME']}</td>
                        <td>{$row['EMAIL']}</td>
                        <td>{$row['ROLE']}</td>
                        <td>
                            <button class='btn btn-warning' onclick='editForm({$row['ID']})'>Edit</button>
                            <a href='./backend/usersOperation.php?op=delete&id={$row['ID']}' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>";

                $i++;
            }
        } else {
            echo "<tr>
                        <td colspan='5'>No data found</td>
                </tr>";
        }

        ?>

    </table>

    <script>
        function editForm(userID) {
            $("#op").val("update");

            var name = $(`#data-${userID} td:nth-child(2)`).text();
            $("#name").val(name);

            var email = $(`#data-${userID} td:nth-child(3)`).text();
            $("#username").val(email);

            $("#userForm").append(`<input type="hidden" name="userID" value="${userID}">`);
        }
    </script>
</body>

</html>