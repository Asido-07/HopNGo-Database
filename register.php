<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lugan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle registration form submission
$registration_message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $uname = trim($_POST['username']);
    $pass = md5(trim($_POST['password']));
    $fname = trim($_POST['firstName']);
    $sname = trim($_POST['surname']);
    $addr = trim($_POST['address']);
    $email = trim($_POST['email']);  // Capture email

    // Validate fields
    if (empty($uname) || empty($pass) || empty($fname) || empty($sname) || empty($addr) || empty($email)) {
        $registration_message = "All fields are required!";
    } else {
        // Insert data into the database including email
        $sql_insert = "INSERT INTO registration (username, password, firstname, surname, address, email) 
                       VALUES ('$uname', '$pass', '$fname', '$sname', '$addr', '$email')";
        if ($conn->query($sql_insert) === TRUE) {
            $registration_message = "Registered successfully!";
        } else {
            $registration_message = "Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Booking</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        .signup-container {
            flex: 1;
            text-align: center;
        }

        .signup-box {
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 70%;
            margin: auto;
        }

        .signup-box h2 {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Green color */
            color: white;
            padding: 10px 15px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .registration-message {
            color: #4CAF50;
            font-size: 1.2em;
            margin-top: 20px;
            font-weight: bold;
        }

        .signup-message {
            color: #333;
            font-size: 0.9em;
            margin-top: 10px;
        }

        .signup-link {
            color: #333;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- register -->
    <div class="signup-container">
        <div class="signup-box">
            <h2>Sign Up</h2>
            <form action="" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName" required>
                <label for="surname">Surname:</label>
                <input type="text" name="surname" id="surname" required>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <button type="submit" name="register">Sign Up</button>
            </form>
            <div id="registration-message" class="registration-message">
                <?php echo $registration_message; ?>
            </div>
            <div class="signup-message">
                Already have an account? <a href="login.php" class="signup-link">Login here</a>.
            </div>
        </div>
    </div>
    <!-- end register -->
</body>
</html>
