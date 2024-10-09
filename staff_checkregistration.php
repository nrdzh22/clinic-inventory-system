<?php
// Include database connection file
include_once "dbconn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve registration data from the form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Note: You should hash passwords for security

    // SQL query to check if the username already exists
    $check_query = "SELECT * FROM staff WHERE username='$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Username already exists
        echo "<script>alert('Username already exists. Please choose a different username.');</script>";
        echo "<script>window.location.href='staff_register.php';</script>";
        exit;
    } else {
        // Insert new staff into the database
        $insert_query = "INSERT INTO staff (name, username, password) VALUES ('$name', '$username', '$password')";

        if (mysqli_query($conn, $insert_query)) {
            // Registration successful
            echo "<script>alert('Registration successful. You can now login.');</script>";
            echo "<script>window.location.href='staff_login.php';</script>";
            exit;
        } else {
            // Registration failed
            echo "<script>alert('Error: Could not execute query');</script>";
            echo "<script>window.location.href='staff_register.php';</script>";
            exit;
        }
    }
} else {
    // Redirect to registration page if accessed directly without POST data
    header("Location: staff_register.php");
    exit;
}
?>
