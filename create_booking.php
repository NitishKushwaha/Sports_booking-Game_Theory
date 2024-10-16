<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $center = $_POST['center'];
    $sport = $_POST['sport'];
    $resource = $_POST['resource'];
    $time_slot = $_POST['time_slot'];

    // Check if the selected time slot is already booked
    $check_query = "SELECT * FROM bookings WHERE booking_date = '$date' AND time_slot = '$time_slot' AND resource_id = $resource";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        // Create a new booking
        $insert_query = "INSERT INTO bookings (user_name, booking_date, time_slot, center_id, sport_id, resource_id) VALUES ('$name', '$date', '$time_slot', $center, $sport, $resource)";
        if (mysqli_query($conn, $insert_query)) {
            $message = "Booking successful!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    } else {
        $message = "Slot already booked!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Booking</title>
    <style>
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

        .message {
            text-align: center;
            margin: 20px 0;
            font-size: 18px;
            color: red;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Booking</h1>
        <?php if (isset($message)): ?>
            <div class="message"><?= $message ?></div>
        <?php endif; ?>
        <button onclick="location.href='sport_selection.php'">Go Back</button>
    </div>
</body>
</html>
