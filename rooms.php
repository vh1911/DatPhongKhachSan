<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Rooms</h1>
    </header>

    <main>
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
</body>
</html>
