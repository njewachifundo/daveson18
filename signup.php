<?php  
include 'taxiConnection.php';
include 'operation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Taxi Booking System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Registration Form Container */
        .form-container2 {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px;
            max-width: 400px; /* Limit the width of the form */
            margin: 40px auto; /* Center the form on the page */
        }

        /* Form Heading */
        .form-container2 h2 {
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
        input[type="password"],
        input[type="email"] {
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

        /* Responsive adjustments */
        @media screen and (max-width: 600px) {
            .form-container2 {
                margin: 20px; /* Reduce margin on smaller screens */
                padding: 15px; /* Adjust padding */
            }

            input[type="text"],
            input[type="password"],
            input[type="email"],
            input[type="submit"] {
                font-size: 14px; /* Slightly smaller font size for mobile */
            }
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

    <!-- Registration Form -->
    <div class="form-container2" id="registerForm">
        <h2 style="color:#333;">Create Account</h2>
        <form method="POST" action="operation.php" style="color:#333;">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <input type="submit" value="Create Account">
        </form>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>