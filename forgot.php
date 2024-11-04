<?php
session_start();
include 'taxiConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === 'request_reset') {
        // Forgot Password - Check if username and email match
        $username = $_POST["username"];
        $email = $_POST["email"];
        
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Store username in session and redirect to password reset form
            $_SESSION['reset_username'] = $username;
            header("Location: ".$_SERVER['PHP_SELF']."?step=reset_password");
            exit();
        } else {
            echo "No user found with that username and email combination.";
        }
    } elseif (isset($_POST['action']) && $_POST['action'] === 'reset_password') {
        // Reset Password Form Submission
        if (isset($_SESSION['reset_username'])) {
            $newPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $username = $_SESSION['reset_username'];
            
            // Update the password in the database for the user
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
            $stmt->bind_param("ss", $newPassword, $username);
            $stmt->execute();
            
            if ($stmt->affected_rows > 0) {
                echo "Password has been reset successfully.";
                // Clear the session variable and redirect to login page or confirmation page
                unset($_SESSION['reset_username']);
                header("Location: login.php");
                exit();
            } else {
                echo "Failed to reset password. Please try again.";
            }
        } else {
            echo "Session expired or invalid request.";
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }
} elseif (isset($_GET['step']) && $_GET['step'] === 'reset_password' && isset($_SESSION['reset_username'])) {
    // Display Password Reset Form if username is stored in session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style>
        .form-container { max-width: 400px; margin: auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); text-align: center; }
        input[type="password"], input[type="submit"] { width: 100%; padding: 12px; margin: 8px 0; border-radius: 4px; border: 1px solid #ccc; }
        input[type="submit"] { background-color: #0f2d3c; color: white; cursor: pointer; transition: 0.3s; }
        input[type="submit"]:hover { background-color: #154057; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Reset Password</h2>
    <form method="POST">
        <input type="hidden" name="action" value="reset_password">
        <label>New Password:</label>
        <input type="password" name="password" required>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required>
        <input type="submit" value="Reset Password">
    </form>
</div>

</body>
</html>

<?php
} else {
    // Display Forgot Password Form if no session is active
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <style>
        .form-container { max-width: 400px; margin: auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); text-align: center; }
        input[type="text"], input[type="email"], input[type="submit"] { width: 100%; padding: 12px; margin: 8px 0; border-radius: 4px; border: 1px solid #ccc; }
        input[type="submit"] { background-color: #0f2d3c; color: white; cursor: pointer; transition: 0.3s; }
        input[type="submit"]:hover { background-color: #154057; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Forgot Password</h2>
    <form method="POST">
        <input type="hidden" name="action" value="request_reset">
        <label>Enter Your Username:</label>
        <input type="text" name="username" placeholder="Your username..." required>
        <label>Enter Your Email:</label>
        <input type="email" name="email" placeholder="Your registered email..." required>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

<?php
}
mysqli_close($conn);
?>
