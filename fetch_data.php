<?php
// Replace the database credentials with your actual values
$servername = 'localhost:8080';
$username = 'root';
$password = '';
$dbname = 'clients123';
$conn = new mysqli($servername, $username, $password, $dbname);
// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT slotid, slotstatus FROM slotavail";
$result = mysqli_query($conn, $sql);

// Convert the result to an associative array and encode as JSON
$data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// Close the database connection
mysqli_close($conn);

// Encode the data as JSON and send it back
echo json_encode(array('slotData' => $data));
?>
