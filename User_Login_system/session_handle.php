<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login_form.php");
    exit();
}

$username = $_SESSION['username'];

// Display welcome message
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
    </style>
</head>

<body>
    <div class="container">
        <h2>Welcome, <?php echo $username; ?></h2>
        <p>You are now logged in.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>