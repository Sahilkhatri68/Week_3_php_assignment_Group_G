<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "week_3_assignment");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select = "SELECT * FROM user_info WHERE username='$username' AND password='$password'";
    $check = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($check);

    if ($data) {
        $_SESSION['username'] = $username; // Set session variable
        header("Location: session_handle.php"); // Redirect to session page
        exit();
    } else {
        $loginError = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
    </style>
</head>

<body>
    <div class="container">
        <h2>User Login</h2>
        <?php if (isset($loginError)) : ?>
            <p class="error"><?php echo $loginError; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br><br>

            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>

</html>