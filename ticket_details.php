<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
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
        }
        .train-info {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
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
    </header>
    <div class="container">
        <h2>Ticket Booking Details</h2>
        <form action="search.php" method="get">
            <input type="text" name="national_id" placeholder="Enter Reg ID">
            <button type="submit" class="btn">Search</button>
        </form>
        <table>
            <tr>
                <th>Train</th>
                <th>From</th>
                <th>To</th>
                <th>Date</th>
                <th>Passengers</th>
                <th>National ID</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            <?php
            // PHP code to fetch and display ticket details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "rail_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM TicketBookings";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["train"] . "</td>";
                    echo "<td>" . $row["departure_location"] . "</td>";
                    echo "<td>" . $row["arrival_location"] . "</td>";
                    echo "<td>" . $row["travel_date"] . "</td>";
                    echo "<td>" . $row["passengers"] . "</td>";
                    echo "<td>" . $row["national_id"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td><button class='btn-delete' data-id='" . $row["id"] . "'>Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No ticket bookings found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
        <div class="btn-container">
            <button class="btn" onclick="window.print()">Print</button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add event listener to delete buttons
            var deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var ticketId = button.getAttribute('data-id');
                    if (confirm('Are you sure you want to delete this ticket?')) {
                        deleteTicket(ticketId);
                    }
                });
            });

            // Function to delete ticket
            function deleteTicket(ticketId) {
                // Send AJAX request to delete ticket
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Ticket deleted successfully, remove row from table
                            var row = document.querySelector('tr[data-id="' + ticketId + '"]');
                            if (row) {
                                row.parentNode.removeChild(row);
                            }
                        } else {
                            // Error handling
                            alert('Error: ' + xhr.responseText);
                        }
                    }
                };
                xhr.open('POST', 'delete_ticket.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.send('ticket_id=' + ticketId);
            }
        });
    </script>
</body>
</html>
