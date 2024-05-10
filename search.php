<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        nav {
            text-align: center;
            margin-top: 10px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #555;
            margin: 0 5px;
        }
        nav a:hover {
            background-color: #333;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .no-results {
            text-align: center;
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>
    <header>
        <img src="railway_logo.png" alt="Railway Logo" width="100" height="100">
        <h1>BD RAIL</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Tickets</a>
            <a href="#">Train Information</a>
            <a href="#">Contact</a>
        </nav>
    </header>
    <div class="container">
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

        // Check if the national ID is provided
        if(isset($_GET['national_id'])) {
            $national_id = $_GET['national_id'];

            // Prepare and execute the SQL query to search for the ticket with the provided national ID
            $sql = "SELECT * FROM TicketBookings WHERE national_id = '$national_id'";
            $result = $conn->query($sql);

            // Display the search result
            if ($result->num_rows > 0) {
                // Output data of each row in a table format
                echo "<h2>Search Results</h2>";
                echo "<table>";
                echo "<tr><th>Train</th><th>From</th><th>To</th><th>Date</th><th>Passengers</th><th>National ID</th><th>Phone Number</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["train"] . "</td>";
                    echo "<td>" . $row["departure_location"] . "</td>";
                    echo "<td>" . $row["arrival_location"] . "</td>";
                    echo "<td>" . $row["travel_date"] . "</td>";
                    echo "<td>" . $row["passengers"] . "</td>";
                    echo "<td>" . $row["national_id"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='no-results'>No results found for National ID: " . $national_id . "</p>";
            }
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
