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
