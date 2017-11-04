<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "collegedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM station ORDER BY sid";
$result = $conn->query($sql);

$output = array();
if ($result->num_rows > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?>