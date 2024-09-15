<?php include '../db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Entry</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Car Entry</h1>
        <form action="" method="POST">
            <label for="car_number">Car Number:</label>
            <input type="text" name="car_number" required>
            <label for="slot_id">Parking Slot:</label>
            <select name="slot_id" required>
                <?php
                $result = $conn->query("SELECT * FROM parking_slots WHERE status='Available'");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['slot_number'] . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="entry">Register Entry</button>
        </form>
    </div>
    <?php
    if (isset($_POST['entry'])) {
        $car_number = $_POST['car_number'];
        $slot_id = $_POST['slot_id'];
        $sql = "INSERT INTO parking_logs (slot_id, car_number, entry_time) VALUES ('$slot_id', '$car_number', NOW())";
        $conn->query($sql);
        $conn->query("UPDATE parking_slots SET status='Occupied' WHERE id='$slot_id'");
        echo "<div class='alert success'>Car entry recorded successfully!</div>";
    }
    $conn->close();
    ?>
</body>
</html>
