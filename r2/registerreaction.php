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
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customers (username, password_hash, email, full_name, phone_number, address, registration_date)
            VALUES ('$username', '$hashed_password', '$email', '$full_name', '$phone_number', '$address', NOW())";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['success'] = "Registration successful!";
        header("Location: login.php"); 
    } else {
        $error = "Error in SQL query: " . mysqli_error($conn);
    }
}
?>
