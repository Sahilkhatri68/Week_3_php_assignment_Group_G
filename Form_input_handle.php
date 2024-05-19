<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
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

    .result {
        margin-top: 20px;
        padding: 10px;
        background-color: #e0ffe0;
        border: 1px solid #b0ffb0;
        border-radius: 5px;
    }

    .error {
        color: red;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Submit Your Information</h2>
        <?php
        $name = $age = $favorite_color = "";
        $nameErr = $ageErr = $favorite_colorErr = "";
        // If condition to check the input is empty or not and it also check its valid or not 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valid = true;

            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
                $valid = false;
            } else {
                $name = htmlspecialchars($_POST["name"]);
            }

            if (empty($_POST["age"])) {
                $ageErr = "Age is required";
                $valid = false;
            } else {
                $age = htmlspecialchars($_POST["age"]);
            }

            if (empty($_POST["favorite_color"])) {
                $favorite_colorErr = "Favorite color is required";
                $valid = false;
            } else {
                $favorite_color = htmlspecialchars($_POST["favorite_color"]);
            }

            if ($valid) {
                echo "<div class='result'>";
                echo "<p><strong>Name:</strong> $name</p>";
                echo "<p><strong>Age:</strong> $age</p>";
                echo "<p><strong>Favorite Color:</strong> $favorite_color</p>";
                echo "</div>";
            } else {
                echo "<div class='error'>Please fill out all fields correctly.</div>";
            }
        }
        ?>
        <!-- html form with php code to get input from user  -->
        <form method="POST" action="">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>
            <span class="error"><?php echo $nameErr; ?></span><br><br>

            <label for="age">Age:</label><br>
            <input type="number" id="age" name="age" value="<?php echo $age; ?>"><br>
            <span class="error"><?php echo $ageErr; ?></span><br><br>

            <label for="favorite_color">Favorite Color:</label><br>
            <select id="favorite_color" name="favorite_color">
                <option value="" <?php echo ($favorite_color == "") ? "selected" : ""; ?>>Select a color</option>
                <option value="Red" <?php echo ($favorite_color == "Red") ? "selected" : ""; ?>>Red</option>
                <option value="Green" <?php echo ($favorite_color == "Green") ? "selected" : ""; ?>>Green</option>
                <option value="Blue" <?php echo ($favorite_color == "Blue") ? "selected" : ""; ?>>Blue</option>
            </select><br>
            <span class="error"><?php echo $favorite_colorErr; ?></span><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>