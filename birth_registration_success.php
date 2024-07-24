<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>
    <link rel="stylesheet" href="style.css">
    <style>
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f0f0f0;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}
</style>
</head>
<body>
    <header>
        <h1>Registration Successful</h1>
    </header>
    <main>
        
            <h2>Registered Information</h2>
            <?php
            // Retrieve parameters from URL
            $name = $_GET['name'];
            $reg_date = $_GET['reg_date'];
            $token = $_GET['token'];
            
            // Display information in a table
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>Registration Date</th><th>Token</th></tr>";
            echo "<tr><td>$name</td><td>$reg_date</td><td>$token</td></tr>";
            echo "</table>";
            ?>
            <h3>Documents Required:</h3>
            <ol>
                <li> Token no by filling the online form at to be brought</li>
                <li>Copy of citizenship certificate of father and mother</li>
                <li>In case of hospital birth, hospital birth certificate or purchase card</li>
                <li>Copy of migration certificate if you have come as a migrant</li>
                <li>Copy of property tax payment certificate</li>
            </ol>
       
    </main>
    <footer>
        <p>&copy; 2023 e-Seva Portal. All rights reserved.</p>
    </footer>
</body>
</html>
