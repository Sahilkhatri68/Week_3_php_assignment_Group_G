<!DOCTYPE html>
<html lang="en">
<!-- styling -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USD to EUR Converter</title>
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
        <h2>USD to EUR Converter</h2>
        <form method="POST" action="">
            <label for="usd_amount">Amount in USD:</label><br>
            <input type="text" id="usd_amount" name="usd_amount" required><br><br>
            <input type="submit" value="Convert">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usd_amount = $_POST['usd_amount'];
            if (is_numeric($usd_amount) && $usd_amount > 0) {
                $exchange_rate = 0.85;
                $eur_amount = $usd_amount * $exchange_rate;
                echo "<div class='result'>Converted Amount: €" . number_format($eur_amount, 2) . "</div>";
            } else {
                echo "<div class='error'>Please enter a valid positive number.</div>";
            }
        }
        ?>
    </div>
</body>

</html>