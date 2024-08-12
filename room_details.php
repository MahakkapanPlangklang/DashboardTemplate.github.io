<!DOCTYPE html>
<html>
<head>
    <title>Room Details</title>
    <style>
        body {
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
           background-color: #f9f9f9;
           width: 350px;
           border: 2px solid #ccc;
           border-radius: 10px;
           padding: 30px;
           text-align: center;
           box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
           font-family: Arial, sans-serif;
        }

    </style>
</head>
<body>
    <?php
    
    $conn = mysqli_connect('localhost', 'root', '', 'booking_system');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
    if (isset($_GET['room_id'])) {
    $roomId = $_GET['room_id'];
    $sql = "SELECT * FROM rooms WHERE room_id = $roomId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $room = mysqli_fetch_assoc($result);

        
        if (isset($room['status'])) {
            ?>
            <h1>Room Details</h1>
            <p>Room Number: <?php echo $room['room_number']; ?></p>
            <p>Room Type: <?php echo getRoomTypeName($conn, $room['room_type_id']); ?></p>
            <p>Capacity: <?php echo $room['capacity']; ?> persons</p>
            <p>Price per Night: ฿<?php echo $room['price_per_night']; ?></p>
            <p>Status: <?php echo ($room['status'] == 0) ? 'Available' : 'Booked'; ?></p>
            <?php
        } else {
            echo "Room information is incomplete.";
        }
    } else {
        echo "Room not found.";
    }

    mysqli_close($conn);
} else {
    echo "Invalid room ID.";
}


    function getRoomTypeName($conn, $typeId) {
        $sql = "SELECT type_name FROM roomtypes WHERE type_id = $typeId";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['type_name'];
        }

        return "Unknown";
    }
    ?>

</body>
</html>
