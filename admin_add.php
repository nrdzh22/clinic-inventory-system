<!-- This section defines the document type and language, sets character encoding, and configures viewport for the page. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Inventory System</title>
    <!-- This style block contains CSS rules for styling the page elements. -->
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
            z-index: 1000; /* Ensure header is above other content */
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
            z-index: 1000; /* Ensure footer is above other content */
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
<!-- This header section contains the title and navigation links of the webpage. -->
<header>
    <div class="container_header_footer">
        <h1>Clinic Inventory System</h1>
        <nav>
            <ul>
                <li><a href="admin_inventorylist.php">Inventory List</a></li>
                <li><a href="admin_inventorymanagement.php">Inventory Management</a></li>
                <li><a href="admin_report.php">Report</a></li>
                <!-- The following link triggers the logout function -->
                <li><a onclick="confirmLogout()">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- This container holds the form for adding inventory items. -->
<div class="container">
    <form action="adminaddaction.php" method="post">
        <p><label for="inventoryName">Inventory Name:</label> <input type="text" id="inventoryName" name="inventoryName" required></p>
        <p><label for="inventoryNumber">Inventory Number:</label> <input type="text" id="inventoryNumber" name="inventoryNumber" required></p>
        <p><label for="description">Description:</label> <input type="text" id="description" name="description"></p>
        <p><label for="expiredDate">Expired Date:</label> <input type="text" id="expiredDate" name="expiredDate"></p>
        <p><label for="quantity">Quantity:</label> <input type="number" id="quantity" name="quantity" required></p>
        <p><label for="category">Category:</label> <input type="text" id="category" name="category"></p>
        <p><label for="price">Price:</label> <input type="text" id="price" name="price" required></p>
        <p style="text-align: center;"><input type="submit" value="Add Inventory"></p>
    </form>
</div>

<!-- This script defines the JavaScript function for confirming logout before redirection. -->
<script>
    function confirmLogout() {
        if (confirm("Are you sure you want to logout?")) {
            window.location.href = "logout.php";
        }
    }
</script>

<!-- This footer section displays copyright information. -->
<footer>
    <div class="container_header_footer">
        <p>&copy; 2017 Clinic Inventory System. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
