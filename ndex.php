<?php
session_start();

// Language translations
$lang = array();

// English Translations
$lang['en'] = array(
    "welcome" => "Welcome to Mzuzu Taxi Booking System",
    "reliable_services" => "Reliable and Convenient Services",
    "about_me" => "About Me",
    "contact_us" => "Contact Us",
    "phone" => "Phone",
    "email" => "Email",
    "address" => "Address",
    "social_media" => "Connect with us on social media."
);

// Chichewa Translations
$lang['ny'] = array(
    "welcome" => "Takulandirani ku Mzuzu Taxi Booking System",
    "reliable_services" => "Ntchito Zodalirika ndi Zosavuta",
    "about_me" => "Zomwe Ndikudziwitsa",
    "contact_us" => "Titumizireni",
    "phone" => "Foni",
    "email" => "Imelo",
    "address" => "Adilesi",
    "social_media" => "Lumikizani nafe pa makanema."
);

// Chitumbuka Translations
$lang['ti'] = array(
    "welcome" => "Tukondwesi ku Mzuzu Taxi Booking System",
    "reliable_services" => "Ntchito za kwambura na mwakukwanira",
    "about_me" => "Zomwe Ndimaziwa",
    "contact_us" => "Lutireni",
    "phone" => "Foni",
    "email" => "Imelo",
    "address" => "Adilesi",
    "social_media" => "Lumikizani nafe pa makanema."
);

// French Translations
$lang['fr'] = array(
    "welcome" => "Bienvenue dans le système de réservation de taxi de Mzuzu",
    "reliable_services" => "Services fiables et pratiques",
    "about_me" => "À propos de moi",
    "contact_us" => "Contactez-nous",
    "phone" => "Téléphone",
    "email" => "Email",
    "address" => "Adresse",
    "social_media" => "Connectez-vous avec nous sur les réseaux sociaux."
);

// Set default language to English if not set
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en'; // default language
}

// Update language in session if a new one is selected
if (isset($_POST['language'])) {
    $_SESSION['lang'] = $_POST['language'];
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh the page
}

$current_lang = $_SESSION['lang']; // Current language
?>

<!DOCTYPE html>
<html lang="<?= $current_lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxi Booking System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f1f1f1; padding: 10px; }
        .header { padding: 30px; text-align: center; background: white; }
        .header h1 { font-size: 50px; }
        .card { background-color: white; padding: 20px; margin-top: 20px; }
        .footer { padding: 20px; text-align: center; background: #ddd; margin-top: 20px; }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><i class="fas fa-home"></i> Home</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-book"></i> Booking</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-info-circle"></i> About</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-phone"></i> Contact</a></li>
                <li class="nav-item">
                    <form method="POST" style="display: inline;">
                        <select name="language" onchange="this.form.submit()">
                            <option value="en" <?= $current_lang == 'en' ? 'selected' : '' ?>>English</option>
                            <option value="ny" <?= $current_lang == 'ny' ? 'selected' : '' ?>>Chichewa</option>
                            <option value="ti" <?= $current_lang == 'ti' ? 'selected' : '' ?>>Chitumbuka</option>
                            <option value="fr" <?= $current_lang == 'fr' ? 'selected' : '' ?>>French</option>
                        </select>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="header">
        <h1><?php echo $lang[$current_lang]['welcome']; ?></h1>
    </div>

    <div class="content">
        <div class="card">
            <h2><?php echo $lang[$current_lang]['reliable_services']; ?></h2>
            <p>We offer reliable and convenient taxi booking services to meet your travel needs.</p>
        </div>
        <div class="card">
            <h2><?php echo $lang[$current_lang]['about_me']; ?></h2>
            <p>Some text about me.</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <h2><?php echo $lang[$current_lang]['contact_us']; ?></h2>
        <p><?php echo $lang[$current_lang]['phone']; ?>: +265 999 123 456</p>
        <p><?php echo $lang[$current_lang]['email']; ?>: <a href="mailto:info@mzuzutaxbooking.com">info@mzuzutaxbooking.com</a></p>
        <p><?php echo $lang[$current_lang]['address']; ?>: Mzuzu, Malawi</p>
        <div class="social-links">
            <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; 2023 Mzuzu Taxi Booking App. All rights reserved.</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
