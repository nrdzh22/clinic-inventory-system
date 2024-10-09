<?php
// Include database connection file
include 'dbconn.php';

// Initialize variables to store form data
$inventoryName = $_POST['inventoryName'];
$inventoryNumber = $_POST['inventoryNumber'];
$description = $_POST['description'];
$expiredDate = $_POST['expiredDate'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$price = $_POST['price'];

// Validate inputs (server-side validation)
$errors = [];

// Example: Check if required fields are not empty
if (empty($inventoryName)) {
    $errors[] = "Inventory Name is required.";
}

if (empty($inventoryNumber)) {
    $errors[] = "Inventory Number is required.";
}

if (empty($quantity)) {
    $errors[] = "Quantity is required.";
}

if (empty($price)) {
    $errors[] = "Price is required.";
}

// If there are validation errors, display them
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>Error: $error</p>";
    }
    exit; // Stop further execution
}

// Prepare SQL insert statement
$sql = "INSERT INTO inventory (inventoryName, inventoryNumber, description, expiredDate, quantity, category, price) 
        VALUES ('$inventoryName', '$inventoryNumber', '$description', '$expiredDate', $quantity, '$category', '$price')";

// Execute SQL query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New inventory item added successfully.');</script>";
    echo "<script>window.location.href='admin_inventorylist.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>