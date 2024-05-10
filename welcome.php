<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Bangladesh Railway System</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('bgrail.png');
            background-size: cover;
            background-position: center;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        nav ul li {
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .container {
            margin: 50px auto;
            width: 80%;
            text-align: center;
        }
        .dashboard-content {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #555;
        }
        @keyframes logoAnimation {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }
    </style>
</head>
<body>
   <header>
        <div class="name">
            <h1 class="logo">Bangladesh Railway</h1>
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
        // Start session to access session variables
        session_start();
        
        // Check if username and user ID are set in session
        if(isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
            $username = $_SESSION['username'];
            $user_id = $_SESSION['user_id'];
            echo "<div class='welcome-message'>Welcome, $username! (User ID: $user_id)</div>";
             echo "<a href='ticket_booking.php?id=$username' class='button'>Ticket Book</a>";
            echo "<a href='train_info.php?id=$username' class='button'>Train Information</a>";
            echo "<div class='logout-link'><a href='logout_user.php'>Logout</a></div>";

        } else {
            
            header("Location: login_user.php");
            exit();
        }
        ?>
    </div>
</body>
</html>
