<?php
// Database connection details
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

// SQL query to update 'James' to 'Jane'
$update_sql = "UPDATE MyGuests SET firstname='Jane' WHERE firstname='James'";

if ($conn->query($update_sql) === TRUE) {
    echo "Record updated successfully<br>";
} else {
    echo "Error updating record: " . $conn->error;
}

// SQL query to fetch updated data from myGuests table
$select_sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
$result = $conn->query($select_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updated Guest List</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Updated Guest List</h2>

<table>
    <tr>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Reg Date</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output data for each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"]. "</td>
                    <td>" . $row["firstname"]. "</td>
                    <td>" . $row["lastname"]. "</td>
                    <td>" . $row["email"]. "</td>
                    <td>" . $row["reg_date"]. "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No results found</td></tr>";
    }

    // Close connection
    $conn->close();
    ?>
</table>
<a href="bai1.4.main.php">main</a>
</body>
</html>
