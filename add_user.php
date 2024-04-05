<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add User</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Add User</button>
        </form>
    </div>
</body>
</html>

<?php
// Include the database connection script
include 'database.php';

// Initialize variables to store form input and error message
$username = "";
$email = "";
$password = "";
$error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate form data (you can add more validation as needed)
    if (empty($username) || empty($email) || empty($password)) {
        $error = "All fields are required";
    } else {
        // Insert data into the 'users' table
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Redirect back to index.php after successful user addition
            header("Location: index.php");
            exit();
        } else {
            $error = "Error adding user: " . $conn->error;
        }
    }
}
?>
