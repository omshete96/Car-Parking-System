<?php include '../db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parking Slot</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Add Parking Slot</h1>
        <form action="" method="POST">
            <label for="slot_number">Slot Number:</label>
            <input type="text" name="slot_number" required>
            <button type="submit" name="add">Add Slot</button>
        </form>
    </div>
    <?php
    if (isset($_POST['add'])) {
        $slot_number = $_POST['slot_number'];
        $sql = "INSERT INTO parking_slots (slot_number, status) VALUES ('$slot_number', 'Available')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert success'>New parking slot added successfully!</div>";
        } else {
            echo "<div class='alert error'>Error: " . $conn->error . "</div>";
        }
    }
    $conn->close();
    ?>
</body>
</html>
