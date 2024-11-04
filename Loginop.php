<?php

session_start();
require_once 'taxiConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM customers WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
if (password_verify(        $password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: Booking.php?message=success");
        } else {
        header("Location: poto.php?message=incorrect_password");
            
        }
    } else {
      
    header("Location: poto.php?message=user_not_found");
    }
    $stmt->close();
    $conn->close();
}
?>
