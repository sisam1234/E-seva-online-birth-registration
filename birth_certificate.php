<?php
// birth_registration.php
@include 'config.php';

$birth_data = null;
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $child_name = $_POST['child_name'];
    $token= $_POST['token'];

    // Fetch data from database using the child's name
    $fetch_birth = mysqli_query($conn, "SELECT * FROM birth_registrations WHERE child_name = '$child_name' and token = '$token'");

    if ($fetch_birth) {
        $birth_data = mysqli_fetch_assoc($fetch_birth);
        if (!$birth_data) {
            $error_message = "No record found for the entered child's name.";
        }
    } else {
        echo "Failed to fetch data: " . mysqli_error($conn);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birth Registration Certificate</title>
    <link rel="stylesheet" href="style_cer.css">
    <style>
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="header">
            <img src="img/image.png" alt="Government of Nepal">
            <h1>Nepal Government<br>(Birth Registration Certificate)</h1>
        </div>
        <?php if (!$birth_data && !$error_message): ?>
        <div class="search-form">
            <form action="birth_certificate.php" method="post">
                <label for="child_name">Enter Child's Full Name:</label>
                <input type="text" id="child_name" name="child_name" required>
                <br><label for="token">Enter the token:</label>
                <input type="text" id="token" name="token" required><br>
                <button type="submit">Search</button>
            </form>
        </div>
        <?php endif; ?>
        <?php if ($birth_data): ?>
        <table class="details-table">
            <tr>
                <th>Registration No.</th>
                <td><?php echo $birth_data['id']; ?></td>
            </tr>
            <tr>
                <th>Registration Date</th>
                <td><?php echo $birth_data['reg_date']; ?></td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td><?php echo $birth_data['child_name']; ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo $birth_data['date_of_birth']; ?></td>
            </tr>
            <tr>
                <th>Sex</th>
                <td><?php echo $birth_data['sex']; ?></td>
            </tr>
            <tr>
                <th>Permanent Address</th>
                <td><?php echo $birth_data['addresss']; ?></td>
            </tr>
            <tr>
                <th>Birth Place</th>
                <td><?php echo $birth_data['place_of_birth']; ?></td>
            </tr>
            <tr>
                <th>Father's Name</th>
                <td><?php echo $birth_data['father_name']; ?></td>
            </tr>
            <tr>
                <th>Father's Citizenship No.</th>
                <td><?php echo $birth_data['father_cid']; ?></td>
            </tr>
            <tr>
                <th>Mother's Name</th>
                <td><?php echo $birth_data['mother_name']; ?></td>
            </tr>
            <tr>
                <th>Mother's Citizenship No.</th>
                <td><?php echo $birth_data['mother_cid']; ?></td>
            </tr>
        </table>
        <div class="signature-section">
            <div class="signature-box">Name of Local Registrar</div>
            <div class="signature-box">Official Stamp</div>
        </div>
        <div class="print-button">
            <button onclick="window.print()">Print</button>
        </div>
        <?php elseif ($error_message): ?>
        <div class="error-message">
            <?php echo $error_message; ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
