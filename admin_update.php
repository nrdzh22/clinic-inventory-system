<?php
// Include database connection file
include 'dbconn.php';

// Check if POST data exists
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $id = $_POST['id'];
    $inventoryName = $conn->real_escape_string($_POST['inventoryName']);
    $inventoryNumber = $conn->real_escape_string($_POST['inventoryNumber']);
    $description = $conn->real_escape_string($_POST['description']);
    $expiredDate = $conn->real_escape_string($_POST['expiredDate']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $category = $conn->real_escape_string($_POST['category']);
    $price = $conn->real_escape_string($_POST['price']);

    // Update query
    $sql = "UPDATE inventory SET 
            inventoryName = '$inventoryName',
            inventoryNumber = '$inventoryNumber',
            description = '$description',
            expiredDate = '$expiredDate',
            quantity = $quantity,
            category = '$category',
            price = $price
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to inventory details page after successful update
        echo "<script>alert('Inventory item updated successfully.');</script>";
        echo "<script>window.location.href='admin_dashboard.php';</script>";
        exit;
    } else {
        echo "Error updating inventory: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
