<?php
// Include database connection file
include_once "dbconn.php";

// Initialize the session (if using sessions for authentication)
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the admin exists with the given username and password
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    // Perform the query
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result) {
        // Check if a row was returned
        if (mysqli_num_rows($result) == 1) {
            // Admin exists, set session variables if using sessions
            $_SESSION['username'] = $username;
            
            // Redirect to admin dashboard or desired page
            header("Location: admin_inventorylist.php");
            exit;
        } else {
            // Admin does not exist or credentials are incorrect
            echo "<script>alert('Invalid username or password');</script>";
            echo "<script>window.location.href='admin_login.php';</script>";
            exit;
        }
    } else {
        // Query execution failed
        echo "<script>alert('Error: Could not execute query');</script>";
        echo "<script>window.location.href='admin_login.php';</script>";
        exit;
    }
} else {
    // Redirect to login page if accessed directly without POST data
    header("Location: admin_login.php");
    exit;
}
?>
