<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Ticket Booking</title>
    <style>
        :root {
            --primary-color: #333;
            --secondary-color: #fff;
            --background-color: #f4f4f4;
            --link-color: #007bff;
            --link-hover-color: #0056b3;
            --border-radius: 5px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('bgrail.png');
            background-size: cover;
            background-position: center;
        }

        header {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: colorChange 5s infinite alternate;
        }

        @keyframes colorChange {
            0% {
                background-color: var(--primary-color);
            }
            100% {
                background-color: #ff8c00; /* Orange color */
            }
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .name h1 {
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li:not(:last-child) {
            margin-right: 20px;
        }

        nav ul li a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: var(--link-hover-color);
            text-decoration: underline;
        }

        
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="number"] {
            width: calc(100% - 22px);
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Ticket Booking</h2>
            <label for="train">Select Train:</label>
            <select id="train" name="train">
                <option value="dhaka_express">Dhaka Express</option>
                <option value="chittagong_shuttle">Chittagong Shuttle</option>
                <!-- Add more options for other trains -->
            </select>
            <label for="from">From:</label>
            <input type="text" id="from" name="from" required>
            <label for="to">To:</label>
            <input type="text" id="to" name="to" required>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <label for="passenger">Number of Passengers:</label>
            <input type="number" id="passenger" name="passenger" min="1" required>
            <label for="national_id">Reg ID:</label>
            <input type="text" id="national_id" name="national_id" required>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="Format: 123-456-7890">
            <input type="submit" value="Book Now">
        </form>
    </div>

      <?php
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

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $train = $_POST["train"];
        $from = $_POST["from"];
        $to = $_POST["to"];
        $date = $_POST["date"];
        $passenger = $_POST["passenger"];
        $national_id = $_POST["national_id"];
        $phone = $_POST["phone"];

        // Check if the same national ID exists in the database
        $check_sql = "SELECT * FROM TicketBookings WHERE national_id='$national_id'";
        $result = $conn->query($check_sql);
        if ($result && $result->num_rows > 0) {
            echo "<script>alert('Booking with this National ID already exists!');</script>";
        } else {
            // Insert data into database
            $sql = "INSERT INTO TicketBookings (train, departure_location, arrival_location, travel_date, passengers, national_id, phone_number) 
                    VALUES ('$train', '$from', '$to', '$date', $passenger, '$national_id', '$phone')";
    
            if ($conn->query($sql) === TRUE) {
                // Redirect to another page
                echo "<script>alert('Ticket booked successfully!'); window.location='ticket_details.php';</script>";
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
