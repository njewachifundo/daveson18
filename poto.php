<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxi Booking System</title>
    <meta name="description" content="Mzuzu Taxi Booking System offers reliable and convenient taxi services in Malawi.">
    <meta name="keywords" content="Taxi, Booking, Malawi, Mzuzu, Transportation">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Color Palette */
        :root {
            --primary-color: #3498db;      /* Blue */
            --secondary-color: #f1f1f1;    /* Light Gray */
            --accent-color: #f1c40f;       /* Yellow */
            --dark-bg-color: #1e1e1e;      /* Dark Gray */
            --dark-card-bg: #2a2a2a;       /* Dark Card Background */
            --text-color: #333;
            --dark-text-color: #ddd;
        }

        /* Global and Responsive Styles */
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            padding: 10px;
            background: var(--secondary-color);
            color: var(--text-color);
            transition: background-color 0.5s, color 0.5s;
        }
        .header {
            padding: 30px;
            text-align: center;
            background: white;
            color: var(--primary-color);
        }
        .header h1 {
            font-size: 50px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .topnav {
            overflow: hidden;
            background-color: var(--primary-color);
            color: white;
            transition: background-color 0.5s;
        }
        .topnav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .topnav a:hover {
            background-color: var(--accent-color);
            color: #333;
        }
        .leftcolumn { float: left; width: 75%; }
        .rightcolumn { float: left; width: 25%; background-color: var(--secondary-color); padding-left: 20px; }
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .footer {
            padding: 20px;
            text-align: center;
            background: var(--secondary-color);
            color: var(--primary-color);
            margin-top: 20px;
        }
        .social-links a {
            margin: 0 10px;
            text-decoration: none;
            color: var(--primary-color);
            transition: color 0.3s;
        }
        .social-links a:hover { color: var(--accent-color); }

        /* Dark Theme */
        .dark-theme {
            background-color: var(--dark-bg-color);
            color: var(--dark-text-color);
        }
        .dark-theme .topnav { background-color: var(--dark-card-bg); }
        .dark-theme .header { background: var(--dark-card-bg); color: var(--accent-color); }
        .dark-theme .card { background-color: var(--dark-card-bg); color: var(--dark-text-color); }
        .dark-theme .footer { background: var(--dark-card-bg); color: var(--dark-text-color); }
        .dark-theme .social-links a { color: var(--accent-color); }
        
        /* Responsive layout adjustments */
        @media screen and (max-width: 800px) {
            .leftcolumn, .rightcolumn { width: 100%; padding: 0; }
        }
        @media screen and (max-width: 600px) {
            .topnav a { float: none; width: 100%; text-align: center; }
        }
        /* Button Styles */
        .book-now {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        .book-now:hover {
            background-color: var(--accent-color);
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="topnav" id="navbar">
        <a href="poto.php"><i class="fas fa-home"></i> Home</a>
        <a href="Booking.php" id="booking-link" onclick="checkLogin(event)"><i class="fas fa-book"></i> Booking</a>
        <a href="about.php"><i class="fas fa-info-circle"></i> About</a>
        <a href="contact.php"><i class="fas fa-phone"></i> Contact</a>
        <a href="#" onclick="toggleTheme()"><i class="fas fa-adjust"></i> Theme</a>
        <a href="login.php" style="float:right"><i class="fas fa-lock"></i> Login</a>
        <a href="signup.php" style="float:right"><i class="fas fa-user-plus"></i> Signup</a>
    </div>

    <div class="row">
        <div class="leftcolumn">
            <div class="card">
                <h2 style="color: var(--primary-color);">Welcome to KP TAXI</h2>
                <h5>We offer reliable transport at any time</h5>
                <p>Experience the best transportation service in Mzuzu, Malawi. Our professional drivers are ready to take you wherever you need to go.</p>
                <button class="book-now" onclick="checkLogin(event)">Book Now</button>
            </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

    <script>
        let isLoggedIn = false; // Change this value based on actual login status

        function checkLogin(event) {
            if (!isLoggedIn) {
                event.preventDefault();
                alert('Please log in to access the booking page.');
                window.location.href = 'login.php'; // Redirect to login page
            }
        }

        function toggleTheme() {
            document.body.classList.toggle("dark-theme");
            document.getElementById("navbar").classList.toggle("dark-theme");
        }
    </script>
</body>
</html>
