<?php
// Include database connection
include 'taxiConnection.php';

// Check if this is a callback from CTecPay
if (isset($_GET['callback']) && $_GET['callback'] == 'true') {
    
    // Get and validate the payment data sent by CTecPay
    $transaction_id = $_POST['transaction_id'] ?? null;
    $status = $_POST['status'] ?? null;
    $amount = $_POST['amount'] ?? null;
    $signature = $_POST['signature'] ?? null;

    // Verify the received data (Check CTecPay documentation for signature validation)
    $expected_signature = hash_hmac('sha256', $transaction_id . $amount, 'YOUR_SECRET_KEY');
    if ($signature !== $expected_signature) {
        die('Invalid signature'); // End if signature doesn't match
    }

    // Process based on the status (assuming 'success' and 'failed' as examples)
    if ($status === 'success') {
        // Update the database to set booking status as "Paid"
        $stmt = $conn->prepare("UPDATE bookings SET status = 'Paid' WHERE transaction_id = ?");
        $stmt->bind_param("s", $transaction_id);
        $stmt->execute();
        
        echo "Payment successful and booking updated.";
    } else {
        // Handle failure case (e.g., log the issue, notify user)
        echo "Payment failed.";
    }

    // Optionally, you may log the callback data for further debugging
    // file_put_contents('callback_log.txt', print_r($_POST, true), FILE_APPEND);
} else {
    echo "No callback data received.";
}
?>
