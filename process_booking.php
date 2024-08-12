<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerId = $_POST['customer_id'];
    $roomId = $_POST['room_id'];
    $checkInDate = $_POST['check_in_date'];
    $checkOutDate = $_POST['check_out_date'];
    $pricePerNight = $_POST['price_per_night'];
    $numberOfDays = $_POST['number_of_days'];
    $totalCost = $_POST['total_cost'];
    $paymentMethod = $_POST['payment_method'];

    
    $transactionDate = date('Y-m-d');

    
    $conn = mysqli_connect('localhost', 'root', '', 'booking_system');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $bookingInsertQuery = "INSERT INTO bookings (customer_id, room_id, check_in_date, check_out_date, total_cost) VALUES ('$customerId', '$roomId', '$checkInDate', '$checkOutDate', '$totalCost')";
    $result = mysqli_query($conn, $bookingInsertQuery);

    if ($result) {
        
        $bookingId = mysqli_insert_id($conn);

        
        $paymentInsertQuery = "INSERT INTO payments (booking_id, transaction_date, payment_method) VALUES ('$bookingId', '$transactionDate', '$paymentMethod')";
        $paymentResult = mysqli_query($conn, $paymentInsertQuery);

        if ($paymentResult) {
            
            $updateRoomQuery = "UPDATE rooms SET status = '1' WHERE room_id = '$roomId'";
            $updateRoomResult = mysqli_query($conn, $updateRoomQuery);

            if ($updateRoomResult) {
                echo "Booking successful!";
                echo "<a href='dashboard.php'> Return to Dashboard<a/>";

            } else {
                echo "Error updating room status: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting payment data: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting booking data: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
