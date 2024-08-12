<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #F5F5F5;
            width: 300px;
            border: 2px solid #E0E0E0;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
			
			//background-image:url('https://s.isanook.com/tr/0/ud/285/1426177/gr.jpg?ip/crop/w728h431/q80/webp');
			//background-repeat: repeat;
        }

        #login {
            background-color: #3CEC97;
            border-radius: 5px;
            color: #fff;
            padding: 10px;
            font-weight: bold;
            margin-top: 20px;
        }

        h1 {
           font-size: 24px;
           olor: #333;
        }

        p {
           font-size: 16px;
           color: #666;
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

    <h2>Login</h2>

    <form action="loginreaction.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button id="login" type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>

</body>
</html>
