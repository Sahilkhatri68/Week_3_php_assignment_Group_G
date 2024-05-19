<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Selector</title>
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
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // color selector code of ajax and jquery
        $(document).ready(function() {
            $('#colorForm').on('submit', function(event) {
                event.preventDefault();
                var selectedColor = $('#color').val();
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: {
                        color: selectedColor
                    },
                    success: function(response) {
                        $('#colorDisplay').html(response);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h2>Select Your Color</h2>
        <!-- form to take input from user to select colour -->
        <form id="colorForm" method="POST">
            <label for="color">Choose a color:</label><br>
            <input type="color" id="color" name="color" required><br><br>
            <input type="submit" value="Submit">
        </form>
        <div id="colorDisplay" class="result">
            <!-- php code to get selcet and display the text color -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['color'])) {
                $color = htmlspecialchars($_POST['color']);
                echo "<p style='color: $color;'>Your Selected Color</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>