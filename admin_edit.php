<?php
// Include database connection file
include 'dbconn.php';

// Check if ID parameter exists in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch inventory data based on ID
    $sql = "SELECT * FROM inventory WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Inventory item not found.";
        exit;
    }
} else {
    echo "ID parameter is missing.";
    exit;
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden; 
        }

        .container {
            max-width: 1500px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            padding-bottom: 100px; 
        }

        form {
            max-width: 600px;
            margin: 20px auto;
        
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px); 
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        header {
            background-color: #8dd9cc;
            color: white;
            padding: 20px 0;
            text-align: center;
            width: 100%;
            z-index: 1000; 
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav {
            text-align: center;
            margin-top: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline-block;
            margin-left: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }

        footer {
            background-color: #8dd9cc;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            height: 60px;
            z-index: 1000; 
            position: fixed;
            bottom: 0;
            left: 0;
        }

        .container_header_footer {
            width: 90%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<header>
    <div class="container_header_footer">
        <h1>Clinic Inventory System</h1>
        <nav>
            <ul>
                <li><a href="admin_inventorylist.php">Inventory List</a></li>
                <li><a href="admin_inventorymanagement.php">Inventory Management</a></li>
                <li><a href="admin_report.php">Report</a></li>
                <li><a onclick="confirmLogout()">Logout</a></li> <!-- Logout button -->
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <form action="admin_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <p><label for="inventoryName">Inventory Name:</label> <input type="text" id="inventoryName" name="inventoryName" value="<?php echo $row['inventoryName']; ?>" required></p>
        <p><label for="inventoryNumber">Inventory Number:</label> <input type="text" id="inventoryNumber" name="inventoryNumber" value="<?php echo $row['inventoryNumber']; ?>" required></p>
        <p><label for="description">Description:</label> <input type="text" id="description" name="description" value="<?php echo $row['description']; ?>"></p>
        <p><label for="expiredDate">Expired Date:</label> <input type="text" id="expiredDate" name="expiredDate" value="<?php echo $row['expiredDate']; ?>"></p>
        <p><label for="quantity">Quantity:</label> <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required></p>
        <p><label for="category">Category:</label> <input type="text" id="category" name="category" value="<?php echo $row['category']; ?>"></p>
        <p><label for="price">Price:</label> <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>" required></p>
        <p style="text-align: center;"><input type="submit" value="Update Inventory"></p>
    </form>
</div>
<script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "logout.php";
            }
        }
    </script>
<footer>
    <div class="container_header_footer">
        <p>&copy; 2017 Clinic Inventory System. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
