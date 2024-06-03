<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 35%;
            margin: 50px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        select:focus {
            outline: none;
            border-color: #4CAF50;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #ff0000;
            margin-top: 5px;
        }

        .success-message {
            color: #008000;
            margin-top: 5px;
        }

        .popup-message {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: #ff0000;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 9999;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>User Registration</h2>
    <form method="POST" id="registrationForm">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phno">Phone Number:</label>
            <input type="tel" id="phno" name="phno" required>
        </div>
        
        <center><button type="submit" name="register">Register</button></center>
    </form>
    <div id="popupMessage" class="popup-message">Username or email already exists!</div>
</div>

<script>
    // Function to show popup message
    function showPopupMessage() {
        document.getElementById('popupMessage').style.display = 'block';
    }

    // Function to hide popup message
    function hidePopupMessage() {
        document.getElementById('popupMessage').style.display = 'none';
    }

    // Function to redirect to login.html
    function redirectToLoginPage() {
        window.location.href = 'login.html';
    }

    // Add event listener to form submission
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        // Check if username or email already exists
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'check_user_email.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                if (xhr.responseText.trim() === 'exists') {
                    showPopupMessage();
                } else {
                    hidePopupMessage();
                    redirectToLoginPage(); // Redirect to login page if registration is successful
                }
            }
        };
        xhr.send('username=' + document.getElementById('username').value + '&email=' + document.getElementById('email').value);
        event.preventDefault();
    });
</script>

</body>
</html>