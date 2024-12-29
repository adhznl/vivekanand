<?php
include 'db.php';

$sql = "SELECT id, username, email, created_at FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Registered Users</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Created At</th></tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td><td>" . $row["created_at"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No registered users found.";
}

$conn->close();
?>
