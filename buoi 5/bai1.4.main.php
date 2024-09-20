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

// Insert functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $insert_sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Change (Update) functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change'])) {
    $id = $_POST['id'];
    $new_firstname = $_POST['firstname'];
    $new_lastname = $_POST['lastname'];

    $change_sql = "UPDATE myGuests SET firstname='$new_firstname', lastname='$new_lastname' WHERE id='$id'";

    if ($conn->query($change_sql) === TRUE) {
        echo "Record updated successfully<br>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $delete_id = $_POST['id'];

    $delete_sql = "DELETE FROM MyGuests WHERE id='$delete_id'";

    if ($conn->query($delete_sql) === TRUE) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data to display
$sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Guest List</title>
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
        form {
            display: inline-block;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Manage Guest List</h2>

<!-- Display table -->
<table>
    <tr>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Reg Date</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output data for each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <form method='post' action=''>
                        <td>" . $row["id"]. "</td>
                        <td><input type='text' name='firstname' value='" . $row["firstname"] . "' required></td>
                        <td><input type='text' name='lastname' value='" . $row["lastname"] . "' required></td>
                        <td>" . $row["email"]. "</td>
                        <td>" . $row["reg_date"]. "</td>
                        <td>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <input type='submit' name='change' value='Change'>
                            <input type='submit' name='delete' value='Delete'>
                        </td>
                    </form>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No results found</td></tr>";
    }
    ?>
</table>

<!-- Insert Form -->
<div style="text-align: center; margin-top: 20px;">
    <h3>Add a New Guest</h3>
    <form method="post" action="">
        <label>First Name:</label>
        <input type="text" name="firstname" required>
        <label>Last Name:</label>
        <input type="text" name="lastname" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit" name="insert">Add Guest</button>
    </form>
</div>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
