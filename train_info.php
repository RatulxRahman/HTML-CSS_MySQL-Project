<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Train Information</title>
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
        <div class="train-info">
            <h2>Train Information</h2>
            <table>
                <tr>
                    <th>Train Name</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Price</th>
                    <th>Seats/Coach</th>
                </tr>
                <tr>
                    <td>Dhaka Express</td>
                    <td>08:00 AM</td>
                    <td>12:00 PM</td>
                    <td>Dhaka</td>
                    <td>Chittagong</td>
                    <td>500BDT</td>
                    <td>20/AC</td>
                </tr>
         
                <tr>
                    <td>Chittagong Shuttle</td>
                    <td>09:00 AM</td>
                    <td>11:00 AM</td>
                    <td>Chittagong</td>
                    <td>Dhaka</td>
                    <td>450BDT</td>
                    <td>11/S-Chair</td>
                </tr>
                <tr>
                    <td>Chitra Express</td>
                    <td>08:00 AM</td>
                    <td>03:00 PM</td>
                    <td>Dhaka</td>
                    <td>Rajsahi</td>
                    <td>470BDT</td>
                    <td>13/Snighda</td>
                </tr>
                <tr>
                    <td>Sonarbangla Express</td>
                    <td>09:00 AM</td>
                    <td>11:00 AM</td>
                    <td>Dhaka</td>
                    <td>Chattogam</td>
                    <td>700BDT</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Chatrala Express</td>
                    <td>05:00 AM</td>
                    <td>11:00 AM</td>
                    <td>Dhaka</td>
                    <td>Chattogram</td>
                    <td>250BDT</td>
                    <td>27/Shovan</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
