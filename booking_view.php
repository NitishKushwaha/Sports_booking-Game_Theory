<?php
// booking_view.php
include 'db_connection.php';

$name = $_GET['name'];
$date = $_GET['date'];
$center = $_GET['center'];
$sport = $_GET['sport'];

// Fetch resources for the selected sport
$query = "SELECT * FROM resources WHERE sport_id = $sport";
$resources_result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View or Create Booking</title>
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

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, select {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking for <?= $name ?> on <?= $date ?></h1>

        <button onclick="location.href='view_bookings.php?name=<?= $name ?>&date=<?= $date ?>&center=<?= $center ?>&sport=<?= $sport ?>'">View Bookings</button>

        <h2>Create New Booking</h2>
        <form method="POST" action="create_booking.php">
            <input type="hidden" name="name" value="<?= $name ?>">
            <input type="hidden" name="date" value="<?= $date ?>">
            <input type="hidden" name="center" value="<?= $center ?>">
            <input type="hidden" name="sport" value="<?= $sport ?>">

            <label for="resource">Select Court/Resource:</label>
            <select name="resource" id="resource" required>
                <?php while ($row = mysqli_fetch_assoc($resources_result)): ?>
                    <option value="<?= $row['resource_id'] ?>"><?= $row['resource_name'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="time_slot">Select Time Slot:</label>
            <select name="time_slot" id="time_slot" required>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <!-- add other slots -->
            </select>

            <button type="submit">Create Booking</button>
        </form>
    </div>
</body>
</html>
