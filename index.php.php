<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'booking_system');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['customer_id'];


$sql_user = "SELECT * FROM customers WHERE customer_id = '$customer_id'";
$result_user = mysqli_query($conn, $sql_user);

if ($result_user) {
    $user = mysqli_fetch_assoc($result_user);
} else {
    die("Error in SQL query: " . mysqli_error($conn));
}


$sql_rooms = "SELECT * FROM rooms";
$result_rooms = mysqli_query($conn, $sql_rooms);

if ($result_rooms) {
    
    while ($row = mysqli_fetch_assoc($result_rooms)) {
        $rooms[] = $row;
    }
} else {
    die("Error in SQL query: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
	body {
    background-color: #f9f9f9;
    font-family: Arial, sans-serif;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh; /* ทำให้เนื้อหาอยู่กลางหน้าจอแนวตั้ง */
}

.room-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 20px; /* ระยะห่างด้านบน */
}

.logout-link {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    background-color: #3CEC97;
    color: #fff;
    border-radius: 5px;
    font-size: 18px;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.logout-link:hover {
    background-color: #29A87A;
}

.logout-link:focus {
    outline: none; /* ลบเส้นกรอบเมื่อกดปุ่ม */
}

.room-item {
    display: flex;
    flex-direction: column; 
    align-items: center;
    margin: 10px;
    padding: 15px;
    border-radius: 10px;
    width: calc(33.33% - 20px);
}

.room-icon {
    font-size: 24px;
    margin-bottom: 5px; 
}

.available {
    background-color: #ff6961; 
    color: #fff; 
}

.booked {
    background-color: #8fbc8f; 
    color: #fff; 
}

.buttons {
    margin-top: 10px; 
}

h2 {
    font-size: 28px;
    color: #333;
    text-align: center;
    margin-top: 50px;
}
h3 {
    font-size: 28px;
    color: #333;
    text-align: center;
    margin-top: 50px;
}
</style>
</head>
<body>

    <h2>Welcome to your Dashboard, <?php echo $user['username']; ?>!</h2>

    <h3>Rooms Status:</h3>

    <div class="room-container">
    <?php foreach ($rooms as $room) : ?>
    <?php $status = intval($room['status']); ?>
    <?php $roomNumber = $room['room_number']; ?>
    <div class="room-item <?php echo ($status == 1) ? 'available' : 'booked'; ?>">
        <i class="room-icon far fa-square"></i>
        <span class="room-number"><?php echo $roomNumber; ?></span>
        <div class="buttons">
            <button class="btn-details" data-room-id="<?php echo $room['room_id']; ?>">ดูรายละเอียด</button>
            <?php if ($status == 0) : ?>
                <button class="btn-book" data-room-id="<?php echo $room['room_id']; ?>">จอง</button>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
   <button class="logout-link" onclick="location.href='logout.php';">Logout</button>
    <script src="dashboard.js"></script>

</body>
</html>

