<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $username = trim($_POST['username']);
    $firstname = trim($_POST['firstname']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate required fields
    if (empty($username) || empty($firstname) || empty($surname) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "All fields are required!";
        exit;
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query to insert data into the "usersd" table
    $stmt = $conn->prepare("INSERT INTO usersd (username, firstname, surname, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $firstname, $surname, $email, $hashed_password);

    // Execute the query
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
