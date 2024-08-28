<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UMS</title>
    <?php
    include "head.php";
    ?>
</head>

<body class="d-flex justify-content-center align-items-center">

    <form class="bg-white p-3 rounded-4" action="backend/login.php" method="post" style="width: min(500px, 90%);">
        <h2 class="my-2">Sign In</h2>
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
        <a href="registerForm.php" class="d-block m-2">New user?</a>
        <button class="btn btn-success">Submit</button>
    </form>


    <script>

        function showPass() {
            if ($("#password").attr("type") == "password") {
                $("#password").attr("type", "text");
            } else {
                $("#password").attr("type", "password");
            }
        }

    </script>
</body>

</html>