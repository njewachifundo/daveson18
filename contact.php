<?php  
include 'taxiConnection.php';
include 'sub_contact.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us</title>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    * {
        box-sizing: border-box;
    }

    /* Container styling */
    .container {
        max-width: 800px;
        margin: auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Header text styling */
    .container h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    /* Image and form column styling */
    .column {
        float: left;
        width: 50%;
        padding: 20px;
    }

    /* Form input styling */
    input[type="text"],
    input[type="email"],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 8px;
        margin-bottom: 16px;
        resize: vertical;
    }

    /* Submit button styling */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Image styling */
    .column img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        object-fit: cover;
    }

    /* Responsive adjustments */
    @media screen and (max-width: 768px) {
        .column {
            width: 100%;
            padding: 10px;
        }
    }
</style>
</head>
<body>

<!-- Include Header -->
<?php include 'header.php'; ?>

<!-- Main Container -->
<div class="container">
    <h2>Contact Us</h2>

    <div class="row">
        <!-- Image Column -->
        <div class="column">
            <img src="R (1).jpeg" alt="Contact Us Image">
        </div>

        <!-- Form Column -->
        <div class="column">
            <form action="sub_contact.php" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name.." required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email.." required>

                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:150px" required></textarea>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>

<!-- Include Footer -->
<?php include 'footer.php'; ?>

</body>
</html>
