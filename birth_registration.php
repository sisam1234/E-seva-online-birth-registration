<?php
// birth_registration.php
@include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_date = $_POST['reg_date'];
    $child_name = $_POST['child_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $sex = $_POST['sex'];
    $address = $_POST['addresss'];
    $place_of_birth = $_POST['place_of_birth'];
    $father_name = $_POST['father_name'];
    $father_cid = $_POST['father_cid'];
    $mother_name = $_POST['mother_name'];
    $mother_cid = $_POST['mother_cid'];
    
    // Generate a unique token
    $token = bin2hex(random_bytes(16)); // Generates a 32-character hex token

    $insert_birth = mysqli_query($conn, "INSERT INTO birth_registrations (reg_date, child_name, date_of_birth, sex, addresss, place_of_birth, father_name, father_cid, mother_name, mother_cid, token) 
    VALUES ('$reg_date', '$child_name', '$date_of_birth', '$sex', '$address', '$place_of_birth', '$father_name', '$father_cid', '$mother_name', '$mother_cid', '$token')");

if ($insert_birth) {
    // Redirect to registration success page with parameters
    header("Location: birth_registration_success.php?name=$child_name&reg_date=$reg_date&token=$token");
    exit();
}
     else {
        echo "Birth registration failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>e-Seva Portal - Birth Registration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <header>
        <h1>e-Seva Portal</h1>
    </header>
    <nav>
        <ul>
            <li><a href="services.php">Services</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <h2>Birth Registration Form</h2>
            <form action="birth_registration.php" method="post">
                <label for="reg_date">Registration Date:</label>
                <input type="date" id="reg_date" name="reg_date" required>

                <label for="child_name">Full Name:</label>
                <input type="text" id="child_name" name="child_name" required>
                
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" required>

                <label for="sex">Sex:</label>
                <input type="text" id="sex" name="sex" required>

                <label for="addresss">Address:</label>
                <input type="text" id="addresss" name="addresss" required>
                
                <label for="place_of_birth">Birth Place:</label>
                <input type="text" id="place_of_birth" name="place_of_birth" required>
                
                <label for="father_name">Father's Name:</label>
                <input type="text" id="father_name" name="father_name" required>
                
                <label for="father_cid">Father's Citizenship No.:</label>
                <input type="text" id="father_cid" name="father_cid" required>
                
                <label for="mother_name">Mother's Name:</label>
                <input type="text" id="mother_name" name="mother_name" required>

                <label for="mother_cid">Mother's Citizenship No.:</label>
                <input type="text" id="mother_cid" name="mother_cid" required>
                
                <button type="submit">Submit</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 e-Seva Portal. All rights reserved.</p>
    </footer>
</body>
</html>
