<?php include '../db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Parking Slots</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Available Parking Slots</h1>
        <table>
            <tr>
                <th>Slot Number</th>
                <th>Status</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM parking_slots");
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['slot_number'] . "</td><td>" . $row['status'] . "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
