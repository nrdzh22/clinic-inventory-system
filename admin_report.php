<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clinic Inventory System - Manage and report inventory stock levels and expired items.">
    <meta name="keywords" content="Clinic, Inventory, Management, Report">
    <title>Clinic Inventory System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333; /* Uniform text color */
        }

        header {
            background-color: #8dd9cc;
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add slight shadow for depth */
        }

        header h1 {
            margin: 0;
            font-size: 28px; /* Slightly larger font for header */
            font-weight: normal; /* Normal weight for clean look */
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
            font-size: 16px; /* Uniform font size for navigation */
        }

        .container {
            flex: 1;
            max-width: 1200px; /* Adjust the max width for better readability */
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
            overflow-y: auto;
        }

        .report-section {
            margin-bottom: 20px;
        }

        h3 {
            font-size: 24px;
            margin-bottom: 10px; /* Add space below headings */
            border-bottom: 2px solid #8dd9cc; /* Underline heading */
            padding-bottom: 5px;
            color: #333; /* Uniform heading color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px; /* Uniform font size for table */
        }

        th, td {
            padding: 12px; /* Slightly increased padding for better spacing */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold; /* Bold header text */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        footer {
            background-color: #8dd9cc;
            color: white;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            margin-top: auto; /* Ensure footer sticks to the bottom */
        }

        .container_header_footer {
            width: 90%;
            margin: 0 auto;
        }

        .print-button {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .print-button button {
            padding: 10px 20px;
            background-color: #8dd9cc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; /* Uniform font size for button */
        }

        .print-button button:hover {
            background-color: #77c4b2;
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
                    <li><a href="#" onclick="confirmLogout()">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="print-button">
            <button onclick="printReport()">Print Report</button>
        </div>
        <?php
        // Include database connection file
        include 'dbconn.php';

        // Prepare and execute current stock query
        $currentStockQuery = $conn->prepare("SELECT * FROM inventory WHERE quantity > 0");
        $currentStockQuery->execute();
        $currentStockResult = $currentStockQuery->get_result();

        // Prepare and execute expired items query
        $expiredItemsQuery = $conn->prepare("SELECT * FROM inventory WHERE expiredDate < CURDATE() AND expiredDate != '0000-00-00'");
        $expiredItemsQuery->execute();
        $expiredItemsResult = $expiredItemsQuery->get_result();
        ?>

        <div class="report-section">
            <h3>Current Stock Levels</h3>
            <?php if ($currentStockResult->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Current Quantity</th>
                            <!-- Add more relevant columns -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $currentStockResult->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['inventoryName']); ?></td>
                                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                <!-- Display more data as needed -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No current stock available.</p>
            <?php endif; ?>
        </div>

        <div class="report-section">
            <h3>Expired Items</h3>
            <?php if ($expiredItemsResult->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Expiration Date</th>
                            <!-- Add more relevant columns -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $expiredItemsResult->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['inventoryName']); ?></td>
                                <td><?php echo htmlspecialchars($row['expiredDate']); ?></td>
                                <!-- Display more data as needed -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No expired items.</p>
            <?php endif; ?>
        </div>

        <?php
        // Close database connection
        $conn->close();
        ?>
    </div>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "logout.php";
            }
        }

        function printReport() {
            window.print();
        }
    </script>
    <footer>
        <div class="container_header_footer">
            <p>&copy; 2017 Clinic Inventory System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
