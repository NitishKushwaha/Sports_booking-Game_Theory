<?php
// center_selection.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $center = $_POST['center'];
    
    // Redirect to the sport selection page with parameters
    header("Location: sport_selection.php?name=$name&date=$date&center=$center");
    exit();
}
?>
