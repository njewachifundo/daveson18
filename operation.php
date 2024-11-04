<?php
require_once 'taxiConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $errors = [];

    // Validate username
    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // Validate phone number
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    }

    // If no errors, proceed with database insertion
    if (empty($errors)) {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind


    // Check if email already exists
    $checkUser = $conn->prepare("SELECT * FROM customers WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $result = $checkUser->get_result();

    if ($result->num_rows > 0) {
        echo "username already exists!";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO customers (username, password, phone, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $hashed_password, $phone, $email);
        if($stmt->execute()){
        echo "Registration successful!";
        header("Location: login.php");
        $stmt->close();
    }
}
}

$checkUser->close();
$conn->close();
}
?>
