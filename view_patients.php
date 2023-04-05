<?php
// Connect to database
$connection = mysqli_connect("localhost", "username", "password", 
"hospital");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Fetch all patients from database
$query = "SELECT * FROM patients";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Date of Birth</th>";
    echo "<th>Medical Details</th>";
    echo "<th>Address</th>";
    echo "<th>Contact Details</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["medical_details"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["contact_details"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No patients found.";
}

// Close database connection
mysqli_close($connection);
?>

