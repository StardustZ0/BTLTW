<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="b2.2.css">
    <title>Bai2.2</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $invoiceid = htmlspecialchars(trim($_POST['invoiceid']));
    $payFor = isset($_POST['payfor']) ? $_POST['payfor'] : [];
    $errors = [];

    // Validate first name
    if (empty($firstname)) {
        $errors[] = "Thiếu firstname mời điền lại";
    }

    // Validate last name
    if (empty($lastname)) {
        $errors[] = "Thiếu lastname mời điền lại.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Không được để trống Email.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email này không hợp lệ mời điền lại.";
        }
    }

    // Validate invoice ID
    if (empty($invoiceid)) {
        $errors[] = "Invoice ID bị thiếu mời nhâp lại.";
    }

    // Validate checkbox
    if (empty($payFor)) {
        $errors[] = "Bạn chưa chọn .";
    }

    if (!empty($errors)) {
        echo "<h3>Form Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "<form>";
        echo "<h1>Bạn đã gửi thành công</h1><br>";
        echo "<p>Đây là hóa đơn của bạn:</p><br>";
        echo "<table>";
        echo "<p><b>Firstname</b>: $firstname</p>";
        echo "<p><b>Lastname</b>: $lastname</p>";
        echo "<p><b>Email</b>: $email</p>";
        echo "<p><b>Invoice ID</b>: $invoiceid</p>";
        echo "<p><b>Pay For</b>:" . htmlspecialchars(implode(', ', $payFor)) . "</p>";
        echo "</table>";
        echo "</form>";
        echo "</ul>";
    }
}
?>
</body>
</html>
