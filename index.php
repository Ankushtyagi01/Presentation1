<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>User Management</h1>
        
        <!-- Display users -->
        <div class="user-list">
            <h2>Users:</h2>
            <ul>
                <?php
                // Include the database connection script
                include 'database.php';

                // Retrieve users from the 'users' table
                $sql = "SELECT id, username, email, password FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li><span>" . $row["username"] . " (" . $row["email"] . ") - Password: " . $row["password"] . "</span><div class='actions'><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a></div></li>";
                    }
                } else {
                    echo "<li>No users found</li>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </ul>
        </div>

        <!-- Link to add user page -->
        <a href="add_user.php" class="btn">Add User</a>
    </div>
</body>
</html>
