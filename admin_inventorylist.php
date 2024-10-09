<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Inventory System</title>
</head>
<style>
 body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure the body takes at least the full height of the viewport */
        }

        header {
            background-color: #8dd9cc;
            color: white;
            padding: 20px 0;
            text-align: center;
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

        .container {
            flex: 1; /* Expand to fill remaining vertical space */
            max-width: 1800px; /* Increase the max width */
            width: 90%; /* Adjust the width to ensure it scales well */
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
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
        }

        .container_header_footer {
            width: 90%;
            margin: 0 auto;
        }
       
</style>
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
        <table id="inventory-table">
            <thead>
                <tr>
                    <th>Inventory Name</th>
                    <th>Inventory Number</th>
                    <th>Description</th>
                    <th>Expired Date</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Include database connection file
                include 'dbconn.php';

                // SQL query to fetch data from inventory table
                $sql = "SELECT * FROM inventory";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["inventoryName"] . "</td>";
                        echo "<td>" . $row["inventoryNumber"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "<td>" . $row["expiredDate"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>" . $row["category"] . "</td>";
                        echo "<td>RM" . $row["price"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No inventory items found.</td></tr>";
                }

                $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</body>
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
</html>