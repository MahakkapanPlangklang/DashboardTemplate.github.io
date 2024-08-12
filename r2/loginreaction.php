<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'booking_system');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM customers WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password_hash'])) {
                $_SESSION['customer_id'] = $row['customer_id'];
                $_SESSION['username'] = $row['username'];
                header("Location: dashboard.php");
                exit(); 
            } else {
                echo "Invalid password, please try again."; 
            }
        } else {
            echo "Invalid username, please try again."; 
        }
    } else {
        echo "Error in SQL query: " . mysqli_error($conn); 
    }
}
?>