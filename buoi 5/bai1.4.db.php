<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37102090";
$password = "Aoloman2004";  
$dbname = "if0_37102090_b5_mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Drop the database if it exists
$sql = "DROP DATABASE IF EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database dropped successfully<br>";
} else {
    echo "Error dropping database: " . $conn->error . "<br>";
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db($dbname);

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS MyGuests (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert data into the table
$sql = "INSERT INTO MyGuests (firstname, lastname, email, reg_date) VALUES
    ('John', 'Doe', 'john@example.com', '2023-09-03 16:30:15'),
    ('Jane', 'Smith', 'jane@example.com', '2023-09-03 16:30:15'),
    ('James', 'Johnson', 'james@example.com', '2023-09-03 16:30:15'),
    ('Emily', 'Brown', 'emily@example.com', '2023-09-03 16:30:15'),
    ('Michael', 'Davis', 'michael@example.com', '2023-09-03 16:30:15')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully<br>";
} else {
    echo "Error inserting data: " . $conn->error;
}

$conn->close();
?>

<a href="bai1.4.show.php">hien bang</a>
</body>
</html>
