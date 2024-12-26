<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Booking</h1>
    </header>

    <main>
        <?php
        if (isset($_GET['room_id'])) {
            $room_id = $_GET['room_id'];
            $sql = "SELECT * FROM rooms WHERE id = '$room_id'";
            $result = mysqli_query($conn, $sql);
            $room = mysqli_fetch_assoc($result);

            if ($room) {
                echo "<h2>Booking Room: {$room['name']}</h2>
                      <p>Price: {$room['price']} USD</p>";

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $check_in = $_POST['check_in'];
                    $check_out = $_POST['check_out'];

                    $sql = "INSERT INTO bookings (name, email, room_id, check_in, check_out) 
                            VALUES ('$name', '$email', '$room_id', '$check_in', '$check_out')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Booking successful!";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            }
        }
        ?>

        <form action="booking.php?room_id=<?php echo $room_id; ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="check_in">Check-in Date:</label>
            <input type="date" id="check_in" name="check_in" required>

            <label for="check_out">Check-out Date:</label>
            <input type="date" id="check_out" name="check_out" required>

            <button type="submit">Book Now</button>
        </form>
    </main>
</body>
</html>
