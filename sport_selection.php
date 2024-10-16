<?php
// sport_selection.php
include 'db_connection.php'; // include your database connection file

$name = $_GET['name'];
$date = $_GET['date'];
$center = $_GET['center'];

// Fetch sports for the selected center
$query = "SELECT * FROM sports WHERE center_id = $center";
$sports_result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Sport</title>
    <style>
        /* Add consistent styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, select, button {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Select a Sport</h1>
        <form method="GET" action="booking_view.php">
            <input type="hidden" name="name" value="<?= $name ?>">
            <input type="hidden" name="date" value="<?= $date ?>">
            <input type="hidden" name="center" value="<?= $center ?>">

            <label for="sport">Select Sport:</label>
            <select name="sport" id="sport" required>
                <?php while ($row = mysqli_fetch_assoc($sports_result)): ?>
                    <option value="<?= $row['sport_id'] ?>"><?= $row['sport_name'] ?></option>
                <?php endwhile; ?>
            </select>

            <button type="submit">Next</button>
        </form>
    </div>
</body>
</html>
