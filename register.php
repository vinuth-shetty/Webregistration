<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Validate input data
    $errors = [];

    if (empty($fullname)) {
        $errors[] = "Full Name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid Email is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }
    if (empty($dob)) {
        $errors[] = "Date of Birth is required.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    // If there are no errors, process the data (e.g., save to database)
    if (empty($errors)) {
        // Here you would typically save the data to a database
        // For demonstration, we'll just display a success message
        echo "<h1>Registration Successful</h1>";
        echo "<p>Thank you for registering, $fullname!</p>";
        // You can also redirect to another page or display a success message
    } else {
        // Display errors
        echo "<h1>Registration Failed</h1>";
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: index.html"); // Change to your form's filename
    exit();
}
?>