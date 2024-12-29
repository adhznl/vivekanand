<?php
$servername = "vivekanand"; // Change if necessary
$username = "school_db"; // Your database username
$password = "CA3F1785083BD240D3FF2046C6383930621023A8"; // Your database password
$dbname = "school_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
