
<?php  
include 'taxiConnection.php';
include 'Loginop.php';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Taxi Booking System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>

  
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Overlay for the Login Form */
#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    display: none; /* Hidden by default */
    z-index: 10; /* Ensure it sits above other content */
}

/* Login Form Container */
.form-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin: 20px auto; /* Center the form */
    max-width: 400px; /* Limit the width of the form */
    position: relative;
    z-index: 20; /* Ensure it sits above the overlay */
}

/* Form Heading */
.form-container h2 {
    margin-bottom: 20px;
    color: #333;
    text-align: center; /* Center the heading */
}

/* Form Label Styles */
label {
    margin-top: 10px;
    font-weight: bold;
    display: block; /* Make labels block elements */
}

/* Input Fields */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

/* Submit Button Styles */
input[type="submit"] {
    background-color: rgb(15, 45, 60);
    color: #fff;
    font-weight: bold;
    padding: 10px;
    border: none;
    border-radius: 7px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%; /* Full width for the button */
}

input[type="submit"]:hover {
    background-color: rgb(21, 64, 87);
}

/* Remember Me Section */
.remember {
    display: flex;
    align-items: center;
    justify-content: space-between; /* Space between checkbox and link */
    margin-bottom: 15px;
}

/* Link Styles */
a {
    color: rgb(15, 45, 60);
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Additional Info Paragraph */
p {
    text-align: center; /* Center the text */
}
    </style>
</head>
<body>

    <?php include 'header.php'; ?>
 <!-- Login Form -->
<div id="overlay" onclick="resetForm()"></div>
<div class="form-container" id="loginForm" style="color:#333;">
    <h2>Login</h2>
    <form method="POST" action="Login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <div class="remember">
            <input type="checkbox">Remember me 
            <a href="forgot.php" style="text-decoration:none;">Forgot Password</a>
        </div>
        
        <input type="submit" value="Login">
        
        <p>Don't have an account? <a href="#" id="showRegisterLink">Create Account</a></p>
    </form>
</div>
    <?php include 'footer.php'; ?>

</body>
</html>