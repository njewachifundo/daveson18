<?php
include 'taxiConnection.php'; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    // Prepare and execute insert query
    $stmt = $conn->prepare("INSERT INTO messages (name, email, subject) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $subject);

    if ($stmt->execute()) {
        echo "Your message has been sent successfully.";
        header("Location: contact.php?status=success");
    } else {
        echo "There was an error sending your message. Please try again.";
        header("Location: contact.php?status=error");
    }

    $stmt->close();
    $conn->close();
}
?>