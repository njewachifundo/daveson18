<?php
// taxiBooking.php - Single file to handle booking, payment initiation, and callback processing

include 'taxiConnection.php'; // Ensure this file establishes a database connection

// CTecPay API credentials and settings
$ctecpay_api_url = "https://www.ctechpay.com/initiate"; // Example endpoint, replace with real one
$ctecpay_api_key = "e88e9e584bda88fe508bfa1abeef8d98"; // Replace with your CTecPay API key
$callback_url = 'http://localhost/taxiBooking.php?callback=true';

// Check if this is a callback from CTecPay
if (isset($_GET['callback'])) {
    // Handle payment callback
    $status = $_GET['status'] ?? 'failed';
    $transaction_id = $_GET['transaction_id'] ?? null;

    if ($status === 'success' && $transaction_id) {
        echo "<h2>Payment Successful! Transaction ID: " . htmlspecialchars($transaction_id) . "</h2>";
    } else {
        echo "<h2>Payment Failed. Please try again.</h2>";
    }
    exit();
}

// Check if this is a payment initiation request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['initiate_payment'])) {
    // Fetch booking amount and other details from form
    $amount = $_POST['amount'];

    // Prepare payment data for CTecPay
    $data = [
        'amount' => $amount,
        'currency' => 'USD',
        'redirect_url' => $callback_url,
        'customer_name' => 'njewaa', // Replace with actual name from form
        'customer_email' => 'njewachifundo@gmail.com.com', // Replace with actual email
    ];

    // Initialize cURL for CTecPay API request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $ctecpay_api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $ctecpay_api_key
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute cURL request
    $response = curl_exec($ch);
    curl_close($ch);

    // Handle the CTecPay response
    $response_data = json_decode($response, true);

    if (isset($response_data['payment_url'])) {
        header('Location: ' . $response_data['payment_url']);
        exit();
    } else {
        echo "<h2>Error initiating payment. Please try again.</h2>";
    }
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Taxi Booking System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Color Scheme */
        :root {
            --primary-bg: #f4f4f4;               /* Light Background */
            --container-bg: #ffffff;             /* White Container Background */
            --primary-color: rgb(15, 45, 60);    /* Primary Dark Blue */
            --button-hover: rgb(21, 64, 87);     /* Button Hover Color */
            --text-color: #333;                  /* Dark Text */
            --input-border-color: #ccc;          /* Input Border */
            --cancel-bg: gray;
            --cancel-hover: darkgray;
        }

        /* Basic Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: var(--primary-bg);
            color: var(--text-color);
            margin: 0;
            padding: 20px;
        }

        #booking-form {
            background-color: var(--container-bg);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 400px;
        }

        #booking-form h2 {
            margin-bottom: 20px;
            color: var(--primary-color);
            text-align: center;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
            display: block;
        }

        input[type="text"], input[type="datetime-local"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid var(--input-border-color);
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: var(--primary-color);
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: var(--button-hover);
        }

        .cancel-btn {
            background-color: var(--cancel-bg);
        }

        .cancel-btn:hover {
            background-color: var(--cancel-hover);
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

    <!-- Booking Form -->
    <div id="booking-form">
        <form id="bookingForm" method="POST" action="taxiBooking.php">
            <h2>Book Your Taxi</h2>
            <label for="location">Pickup Location:</label>
            <input type="text" id="location" placeholder="Enter your pickup location" name="pickup_location" required>

            <label for="destination">Destination:</label>
            <input type="text" id="destination" placeholder="Enter your destination" name="destination" required>

            <label for="time">Pickup Date & Time:</label>
            <input type="datetime-local" id="time" name="booking_time" required>

            <label for="class">Taxi Class:</label>
            <select id="class" name="class" required>
                <option value="select">Select</option>
                <option value="Executive">Executive</option>
                <option value="Standard">Standard</option>
                <option value="Economy">Economy</option>
            </select>

            <button type="submit">Confirm Booking</button>
        </form>

        <!-- Payment Button (CTecPay Integration) -->
        <form method="POST" action="taxiBooking.php">
            <input type="hidden" name="amount" value="100"> <!-- Replace with dynamic amount -->
            <button type="submit" name="initiate_payment">Pay with CTecPay</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
