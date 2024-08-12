<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
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
           box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
           font-family: Arial, sans-serif; /* เปลี่ยนแบบอักษร */
        }

        #register {
           background-color: #3CEC97;
           border-radius: 5px; /* ลดขนาดขอบมนให้เล็กลง */
           color: #fff;
           padding: 10px 20px; /* เพิ่มช่องว่างด้านซ้ายขวา */
           font-weight: bold;
           margin-top: 20px;
           cursor: pointer; /* เพิ่ม Cursor ให้เป็นสัญลักษณ์ของการคลิก */
        }

        #register:hover { /* เพิ่มสีเขียวเข้ามาเพื่อเพิ่มอิทธิพลตอนโฮเวอร์ */
           background-color: #3CEC97;
        }
		form {
           display: flex;
           flex-direction: column;
           align-items: center;
        }

        form label {
           margin-top: 10px;
        }

        form input,
        form textarea {
           width: 250px;
           padding: 8px;
           margin-top: 5px;
           border: 1px solid #000;
           border-radius: 5px;
           box-sizing: border-box;
        }

        form button {
           width: 250px;
           padding: 10px 20px;
           margin-top: 20px;
        }
    </style>
</head>
<body>

    <h2>Register</h2>

    <form action="registerreaction.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
        <br>
        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" required>
        <br>
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
        <br><br>
        <button id="register" type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>

</body>
</html>
