<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom Styles */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* About Section */
        .about-section {
            padding: 60px 20px;
            text-align: center;
            background-color: #474e5d;
            color: white;
        }

        /* Team Card Styles */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 16px 0;
            transition: 0.3s;
            border: none;
            border-radius: 8px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            height: 250px;
            width: 100%;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-title {
            font-size: 1.3rem;
            margin-bottom: 8px;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        .card-footer .social-icons a {
            color: #333;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .card-footer .social-icons a:hover {
            color: #5dd2f2;
        }

        /* Button Styling */
        .btn-contact {
            background-color: #000;
            color: white;
            transition: background-color 0.3s;
        }

        .btn-contact:hover {
            background-color: #333;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .about-section h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <!-- About Section -->
    <div class="about-section">
        <h1>About Us</h1>
        <p>MAKING TRANSPORTATION EASY AND AFFORDABLE AT ANY TIME</p>
    </div>

    <!-- Our Team Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Our Team</h2>
        <div class="row">
            <!-- Team Member 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="371.jpg" alt="Charles Kapawo">
                    <div class="card-body text-center">
                        <h3 class="card-title">CHARLES KAPAWO</h3>
                        <p class="card-text text-muted">CEO & Founder</p>
                        <p class="card-text">Passionate leader with over 8 years in the industry, committed to making a difference.</p>
                        <p><a href="mailto:charleskapawo@gmail.com">charleskapawo@gmail.com</a></p>
                        <button class="btn btn-contact btn-block">Contact</button>
                    </div>
                    <div class="card-footer text-center">
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook fa-lg" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
                            <a href="#"><i class="fab fa-twitter fa-lg" aria-hidden="true"></i><span class="sr-only">Twitter</span></a>
                            <a href="#"><i class="fab fa-linkedin fa-lg" aria-hidden="true"></i><span class="sr-only">LinkedIn</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="371.jpg" alt="Frezzer Ngulubr">
                    <div class="card-body text-center">
                        <h3 class="card-title">Frezzer Ngulube</h3>
                        <p class="card-text text-muted">DRIVER</p>
                        <p class="card-text">Passionate Driver</p>
                        <p><a href="mailto:frezzerngulube@gmail.com">frezzerngulube@gmail.com</a></p>
                        <button class="btn btn-contact btn-block">Contact</button>
                    </div>
                    <div class="card-footer text-center">
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook fa-lg" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
                            <a href="#"><i class="fab fa-twitter fa-lg" aria-hidden="true"></i><span class="sr-only">Twitter</span></a>
                            <a href="#"><i class="fab fa-linkedin fa-lg" aria-hidden="true"></i><span class="sr-only">LinkedIn</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="371.jpg" alt="Moses Mphande">
                    <div class="card-body text-center">
                        <h3 class="card-title">Moses Mphande</h3>
                        <p class="card-text text-muted">DRIVER</p>
                        <p class="card-text">passionate and hard working</p>
                        <p><a href="mailto:mosesmphande@gmail.com">mosesmphande@gmail.com</a></p>
                        <button class="btn btn-contact btn-block">Contact</button>
                    </div>
                    <div class="card-footer text-center">
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook fa-lg" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
                            <a href="#"><i class="fab fa-twitter fa-lg" aria-hidden="true"></i><span class="sr-only">Twitter</span></a>
                            <a href="#"><i class="fab fa-linkedin fa-lg" aria-hidden="true"></i><span class="sr-only">LinkedIn</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
