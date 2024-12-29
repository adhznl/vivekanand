<?php
// Path to save the data
$filePath = 'user_data.csv';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); // You may want to hash this in a real app

    // Validate input
    if (!empty($username) && !empty($email) && !empty($password)) {
        // Prepare data to save
        $data = [$username, $email, $password, date('Y-m-d H:i:s')];

        // Check if the file exists
        $isNewFile = !file_exists($filePath);

        // Open the file for appending
        $file = fopen($filePath, 'a');

        // If the file is new, add a header row
        if ($isNewFile) {
            fputcsv($file, ['Username', 'Email', 'Password', 'Date Registered']);
        }

        // Save the user data as a CSV row
        fputcsv($file, $data);

        // Close the file
        fclose($file);

        // Success message
        echo "<script>alert('Registration successful!');</script>";
    } else {
        // Error message
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
