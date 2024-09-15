<?php include '../db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Exit</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Car Exit</h1>
        <form action="" method="POST">
            <label for="car_number">Car Number:</label>
            <input type="text" name="car_number" required>
            <button type="submit" name="exit">Register Exit</button>
        </form>
    </div>
    <?php
    if (isset($_POST['exit'])) {
        $car_number = $_POST['car_number'];
        $result = $conn->query("SELECT * FROM parking_logs WHERE car_number='$car_number' AND exit_time IS NULL");
        if ($row = $result->fetch_assoc()) {
            $slot_id = $row['slot_id'];
            $conn->query("UPDATE parking_logs SET exit_time=NOW() WHERE id='" . $row['id'] . "'");
            $conn->query("UPDATE parking_slots SET status='Available' WHERE id='$slot_id'");
            echo "<div class='alert success'>Car exit recorded successfully!</div>";
        } else {
            echo "<div class='alert error'>No active entry found for this car.</div>";
        }
    }
    $conn->close();
    ?>
</body>
</html>
