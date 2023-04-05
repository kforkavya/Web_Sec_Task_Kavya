<?php
    // Connect to database
    $connection = mysqli_connect("localhost", "username", "password", 
"hospital");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Save patient details to database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $medical_details = $_POST["medical_details"];
    $address = $_POST["address"];
    $contact_details = $_POST["contact_details"];

    $query = "INSERT INTO patients (name, dob, medical_details, address, contact_details) VALUES ('$name', '$dob', '$medical_details', '$address', '$contact_details')";
    if (mysqli_query($connection, $query)) {
        echo "<div class='alert alert-success' role='alert'>Patient details saved successfully.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error saving patient details: " . mysqli_error($connection) . "</div>";
    }
}

    // Close database connection
    mysqli_close($connection);
?>
