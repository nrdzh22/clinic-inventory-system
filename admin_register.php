<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLINIC INVENTORY SYSTEM</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: white;
            color: #333333;
        }

        .container {
            width: 90%;
            margin: 0 auto;
           
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
            text-align: right;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: inline-block;
        }

        nav ul li {
            display: inline-block;
            margin-left: 20px;
            position: relative;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            width: 90px; /* Adjusted width */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            left: 50%; /* Adjust positioning */
            transform: translateX(-50%);
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        footer {
            background-color: #8dd9cc;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        form {
            text-align: center;
        }

        form p {
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 120px; /* Adjust width as needed */
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            width: 250px; /* Adjust width as needed */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>CLINIC INVENTORY SYSTEM</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="dropdown">
                        <a href="#">Staff</a>
                        <div class="dropdown-content">
                            <a href="staff_register.php">Sign Up</a>
                            <a href="staff_login.php">Login</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Admin</a>
                        <div class="dropdown-content">
                            <a href="admin_register.php">Sign Up</a>
                            <a href="admin_login.php">Login</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
            <h2 align="center"><font face="Times New Roman" color="black">Administrator Registration</font></h2>
            <h2 align="center"><font face="Times New Roman" color="black">Don't have account?Create now.</font></h2>
            <form action="admin_checkregistration.php" method="post" align="center">
                <p><label for="name">NAME:</label> <input type="text" id="name" name="name" required="required"></p>
                <p><label for="username">USERNAME:</label> <input type="text" id="username" name="username" required="required"></p>
                <p><label for="password">PASSWORD:</label> <input type="password" id="password" name="password" required="required"></p>
                <br>
                <p>
                    <input type="submit" value="SIGN UP">
                    <span style="margin-left: 30px;"></span><!-- Adding space between buttons -->
                    <a href="admin_login.php"><input type="button" value="LOGIN"></a>
                </p>
            </form>
    </div>
    <footer>
        <div class="container">
            <p>&copy; 2017 Clinic Inventory System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
