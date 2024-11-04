<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

        /* Navigation Bar Styles */
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

/* Top Navigation Bar */
.topnav {
    background-color: #333; /* Dark background */
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Subtle shadow */
}

/* Navigation Links */
.topnav a {
    float: left; /* Align links to the left */
    display: block;
    color: white; /* Text color */
    text-align: center;
    padding: 14px 20px; /* Padding for links */
    text-decoration: none; /* Remove underline */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition */
}

/* Hover Effects */
.topnav a:hover {
    background-color: #575757; /* Darker background on hover */
    color: #fff; /* Change text color on hover */
}

/* Right-aligned Links */
.topnav .right {
    float: right; /* Align right links to the right */
}

/* Responsive Design */
@media screen and (max-width: 600px) {
    .topnav a {
        float: none; /* Stack links on small screens */
        width: 100%; /* Full width */
    }
}
    </style>
</head>
<body>
<!-- header.php -->
<div class="topnav" id="navbar">
    <a href="poto.php"><i class="fas fa-home"></i> Home</a>
    <a href="Booking.php"><i class="fas fa-book"></i> Booking</a>
    <a href="about.php"><i class="fas fa-info-circle"></i> About</a>
    <a href="contact.php"><i class="fas fa-phone"></i> Contact</a>
    <a href="#" onclick="toggleTheme()"><i class="fas fa-adjust"></i> Theme</a>
    <a href="login.php" class="right"><i class="fas fa-lock"></i> Login</a>
    <a href="signup.php" class="right"><i class="fas fa-user-plus"></i> Signup</a>
</div>
<script>
    function toggleTheme() {
            var element = document.body;
            element.classList.toggle("dark-theme");
            var navbar = document.getElementById("navbar");
            navbar.classList.toggle("dark-theme");
        }
</script>
</body>
</html>