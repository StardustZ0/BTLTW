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

// Insert multiple rows into the myGuests table
$sql = "INSERT INTO myGuests (firstname, lastname, email, reg_date) VALUES
    ('John', 'Doe', 'john@example.com', '2023-09-03 16:30:15'),
    ('Jane', 'Smith', 'jane@example.com', '2023-09-03 16:30:15'),
    ('James', 'Johnson', 'james@example.com', '2023-09-03 16:30:15'),
    ('Emily', 'Brown', 'emily@example.com', '2023-09-03 16:30:15'),
    ('Michael', 'Davis', 'michael@example.com', '2023-09-03 16:30:15')";

if ($conn->query($sql) === TRUE) {
    echo "Records inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<a href="BaiTap/bai1.4_main.php">bang main</a>
</body>
</html>