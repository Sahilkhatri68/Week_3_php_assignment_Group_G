<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        padding: 20px;
        background-color: #f5f5f5;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: 0 auto;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }

    .success {
        color: green;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>User Registration</h2>
        <?php
        // Define variables and initialize with empty values
        $username = $email = $password = $confirm_password = "";
        $usernameErr = $emailErr = $passwordErr = $confirm_passwordErr = $successMsg = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valid = true;

            // Validate username
            if (empty($_POST["username"])) {
                $usernameErr = "Username is required";
                $valid = false;
            } else {
                $username = htmlspecialchars($_POST["username"]);
            }

            // Validate email
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                $valid = false;
            } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $valid = false;
            } else {
                $email = htmlspecialchars($_POST["email"]);
            }

            // Validate password
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
                $valid = false;
            } else {
                $password = htmlspecialchars($_POST["password"]);
            }

            // Validate confirm password
            if (empty($_POST["confirm_password"])) {
                $confirm_passwordErr = "Confirm Password is required";
                $valid = false;
            } elseif ($_POST["confirm_password"] !== $_POST["password"]) {
                $confirm_passwordErr = "Passwords do not match";
                $valid = false;
            } else {
                $confirm_password = htmlspecialchars($_POST["confirm_password"]);
            }

            // Check if all validations are successful
            if ($valid) {
                $successMsg = "Registration successful!";
                // Here you can add code to handle the form data, e.g., save to a database
            }
        }
        ?>
        <?php if ($successMsg) : ?> //it display success maesage
        <p class="success"><?php echo $successMsg; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="error"><?php echo $usernameErr; ?></div>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>"><br><br>

            <div class="error"><?php echo $emailErr; ?></div>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br><br>

            <div class="error"><?php echo $passwordErr; ?></div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>

            <div class="error"><?php echo $confirm_passwordErr; ?></div>
            <label for="confirm_password">Confirm Password:</label><br>
            <input type="password" id="confirm_password" name="confirm_password"><br><br>

            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>