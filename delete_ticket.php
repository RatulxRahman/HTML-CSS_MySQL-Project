<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Ticket</title>
    <style>
        /* CSS styles */
    </style>
</head>
<body>
    <header>
        <div class="name">
            <h1>Bangladesh Railway</h1>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="login_user.php">User</a></li>
                <li><a href="train_info.php">Train Information</a></li>
                <li><a href="ticket_booking.php">Ticket Booking</a></li>
                <li><a href="help.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <?php
        // Check if ticket_id is set and not empty
        if (isset($_POST['ticket_id']) && !empty($_POST['ticket_id'])) {
            // Database configuration
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "rail_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute SQL statement to delete ticket
            $stmt = $conn->prepare("DELETE FROM TicketBookings WHERE id = ?");
            $stmt->bind_param("i", $ticketId);

            // Set parameter
            $ticketId = $_POST['ticket_id'];

            // Execute statement
            if ($stmt->execute()) {
                // Deletion successful
                echo "<p>Ticket deleted successfully.</p>";
            } else {
                // Error handling
                echo "<p>Error: " . $stmt->error . "</p>";
            }

            // Close connection
            $stmt->close();
            $conn->close();
        } else {
            // If ticket_id is not set or empty
            echo "<p>Invalid request.</p>";
        }
        ?>
    </div>
</body>
</html>
