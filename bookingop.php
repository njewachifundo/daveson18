<?php
require_once 'taxiConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup = trim($_POST['pickup_location']);
    $destination = trim($_POST['destination']);
    $date = trim($_POST['booking_time']);
    $class = trim($_POST['class']);
    $errors = [];

    if (empty($pickup)) {
        $errors[] = "Pickup location is required.";
    }

    if (empty($destination)) {
        $errors[] = "Destination is required.";
    }

    if (empty($date)) {
        $errors[] = "Booking time is required.";
    }

    if ($class === "select") {
        $errors[] = "Taxi class is required.";
    }

    // If no errors, proceed with database insertion
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO bookings(pickup_location, destination, booking_time, class) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $pickup, $destination, $date, $class);
        
        if ($stmt->execute()) {
            echo "Booked successfully!";
            header("Location: poto.php");
            exit(); // Prevent further execution
        } else {
            echo "Error: " . $stmt->error; // Display error if execution fails
        }
        
        $stmt->close();
    }
}

$conn->close();
?>