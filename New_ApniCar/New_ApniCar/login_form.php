<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "E22CSEU1029";
    $dbname = "CarGo.com";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get email and password from POST request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation and sanitization
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $sql = "INSERT INTO login (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect user to home page
        header("Location: index.html#home");
        exit();
    } else {
        // Handle error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect user to login page if accessed directly
    header("Location: login.html");
    exit();
}
?>
