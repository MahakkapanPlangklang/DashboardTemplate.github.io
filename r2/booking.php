<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

function getRoomTypeName($conn, $roomTypeId)
{
    $sql = "SELECT type_name FROM roomtypes WHERE type_id = $roomTypeId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['type_name'];
    } else {
        return "Unknown";
    }
}

if (isset($_GET['room_id'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'booking_system');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $roomId = $_GET['room_id'];

    $sql = "SELECT * FROM rooms WHERE room_id = $roomId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $room = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Room Booking</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f9f9f9;
                    padding: 20px;
                }

                form {
                    margin-top: 20px;
                }

                label {
                    display: inline-block;
                    width: 150px;
                    text-align: right;
                    margin-right: 10px;
                }

                input[type="date"],
                input[type="number"],
                input[type="text"],
                select {
                    width: 200px;
                    padding: 5px;
                    border-radius: 5px;
                    border: 1px solid #ccc;
                    margin-bottom: 10px;
                }

                input[type="date"]:focus,
                input[type="number"]:focus,
                input[type="text"]:focus,
                select:focus {
                    outline: none;
                    border-color: #3CEC97;
                    box-shadow: 0 0 5px rgba(60, 236, 151, 0.5);
                }

                h1 {
                    color: #333;
                    text-align: center;
                }

                button {
                    background-color: #3CEC97;
                    border-radius: 10px;
                    color: #fff;
                    padding: 10px;
                    margin-top: 20px;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }

                button:hover {
                    background-color: #29A87A;
                }
            </style>
        </head>
        <body>
        <h1>Room Booking</h1>
        <p>Room Number: <?php echo $room['room_number']; ?></p>
        <p>Room Type: <?php echo getRoomTypeName($conn, $room['room_type_id']); ?></p>
        <p>Capacity: <?php echo $room['capacity']; ?> persons</p>
        <p>Price per Night: $<?php echo $room['price_per_night']; ?></p>

        <form action="process_booking.php" method="post">
            <input type="hidden" name="customer_id" value="<?php echo $_SESSION['customer_id']; ?>">
            <input type="hidden" name="room_id" value="<?php echo $roomId; ?>">
            <label for="check_in_date">Check-in Date:</label>
            <input type="date" name="check_in_date" id="check_in_date" required onchange="calculateNumberOfDays()">

            <label for="check_out_date">Check-out Date:</label>
            <input type="date" name="check_out_date" id="check_out_date" required onchange="calculateNumberOfDays()">

            <input type="hidden" name="price_per_night" value="<?php echo $room['price_per_night']; ?>">

            <label for="number_of_days">Number of Days:</label>
            <input type="number" name="number_of_days" id="number_of_days" min="1" required readonly>
            <br>
            <label for="total_cost">Total Cost:</label>
            <input type="text" name="total_cost" id="total_cost" value="" readonly>

            <label for="payment_method">Payment Method:</label>
            <select name="payment_method" required>
                <option value="Credit Card">Credit Card</option>
                <option value="PayPal">PayPal</option>
                
            </select>
            <br><br>
            <button type="submit">Book Now</button>
        </form>

        <script>
            function calculateNumberOfDays() {
                var checkInDate = new Date(document.getElementById('check_in_date').value);
                var checkOutDate = new Date(document.getElementById('check_out_date').value);

                var timeDiff = checkOutDate.getTime() - checkInDate.getTime();
                var numberOfDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

                document.getElementById('number_of_days').value = numberOfDays;

                var pricePerNight = parseFloat(document.getElementsByName('price_per_night')[0].value);
                var totalCost = pricePerNight * numberOfDays;
                document.getElementById('total_cost').value = totalCost.toFixed(2);
            }
        </script>
        </body>
        </html>
        <?php
    } else {
        echo "Room not found.";
    }

    mysqli_close($conn);
} else {
    echo "Invalid room ID.";
}
?>
