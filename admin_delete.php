<?php
// Include database connection file
include 'dbconn.php';

// Check if ID parameter exists in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare SQL statement to delete inventory item
    $sql = "DELETE FROM inventory WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to inventory list page after successful deletion
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID parameter is missing.";
}

// Close database connection
$conn->close();
?>
