<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $uname = $_POST['uname'];
    $phone = $_POST['Phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

   
    // Insert data into Firebase (your existing Firebase code)
    // ...

    // Insert data into SQL database
    $servername = 'localhost:8080';
    $username = 'root';
    $password = '';
    $dbname = 'clients123';
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO users123 (uname, Phone, address, email) VALUES ('$uname', '$phone', '$address', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

