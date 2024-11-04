<?php  

include 'taxiConnection.php';

// Check if admin is logged in (you may need to set up a session check for this)
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Messages</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>

<h2>Admin Panel - Messages</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Sent At</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM messages ORDER BY sent_at DESC");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['sent_at'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No messages found</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>
