<?php
// Database configuration
$servername = "mysql";
$username = "deployment-tuto";
$password = "deployment-tuto";
$dbname = "deployment-tuto"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enregistrer'])) {
    // Retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $email = $conn->real_escape_string($_POST['email']);
    $country = $conn->real_escape_string($_POST['country']);
    $message = $conn->real_escape_string($_POST['message']);

    // Checkboxes handling (1 if checked, 0 if not)
    $service_customer = isset($_POST['service_customer']) ? 1 : 0;
    $service_marchand = isset($_POST['service_marchand']) ? 1 : 0;
    $service_retailer = isset($_POST['service_retailer']) ? 1 : 0;
    $service_delivery = isset($_POST['service_delivery']) ? 1 : 0;
    $notify = isset($_POST['notify']) ? 1 : 0;

    // Insert query
    $sql = "INSERT INTO contacts (
                name, phone_number, email, country, message, 
                service_customer, service_marchand, service_retailer, service_delivery, notify
            ) VALUES (
                '$name', '$phone_number', '$email', '$country', '$message', 
                $service_customer, $service_marchand, $service_retailer, $service_delivery, $notify
            )";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Record added successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Fetch all records
$result = $conn->query("SELECT * FROM contacts");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Submissions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container">
    <h2 class="mb-4">List of Contact Submissions</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Country</th>
                <th>Message</th>
                <th>Services</th>
                <th>Notify</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) :
                $i = 1;
                while($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['phone_number']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['country']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                    <td>
                        <?= $row['service_customer'] ? 'Customer ' : '' ?>
                        <?= $row['service_marchand'] ? 'Merchant ' : '' ?>
                        <?= $row['service_retailer'] ? 'Retailer ' : '' ?>
                        <?= $row['service_delivery'] ? 'Delivery ' : '' ?>
                    </td>
                    <td><?= $row['notify'] ? 'Yes' : 'No' ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
            <?php endwhile;
            else : ?>
                <tr><td colspan="9" class="text-center">No records found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
?>
