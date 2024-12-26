<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to Our Hotel</h1>
        <nav>
            <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="rooms.php">Rooms</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Available Rooms</h2>
        <div class="rooms">
            <?php
            $sql = "SELECT * FROM rooms";
            $result = mysqli_query($conn, $sql);
            while($room = mysqli_fetch_assoc($result)) {
                echo "<div class='room'>
                        <h3>{$room['name']}</h3>
                        <p>Price: {$room['price']} USD</p>
                        <a href='booking.php?room_id={$room['id']}'>Book Now</a>
                      </div>";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Hotel Booking</p>
    </footer>
</body>
</html>
