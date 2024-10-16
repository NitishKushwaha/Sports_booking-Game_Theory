<?php
include 'db_connection.php';

$name = $_GET['name'];
$date = $_GET['date'];
$center = $_GET['center'];
$sport = $_GET['sport'];

// Fetch existing bookings for the selected day, center, and sport
$query = "SELECT * FROM bookings WHERE booking_date = '$date' AND center_id = $center AND sport_id = $sport";
$bookings_result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Bookings</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Bookings for <?= $date ?></h1>

        <?php if (mysqli_num_rows($bookings_result) > 0): ?>
        <table>
            <tr>
                <th>Time Slot</th>
                <th>Resource</th>
                <th>Booked By</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($bookings_result)): ?>
            <tr>
                <td><?= $row['time_slot'] ?></td>
                <td><?= $row['resource_id'] ?></td>
                <td><?= $row['user_name'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
        <p>No bookings found for the selected date and sport.</p>
        <?php endif; ?>
    </div>
</body>
</html>
