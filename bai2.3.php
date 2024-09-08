<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data and sanitize inputs
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $invoiceid = htmlspecialchars(trim($_POST['invoiceid']));
    $payfor = isset($_POST['payfor']) ? $_POST['payfor'] : [];
    $receipt = $_FILES['pic'];

    // Save to sessions (except the file, we'll handle that later)
    $_SESSION['lastname'] = $lastname;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['email'] = $email;
    $_SESSION['invoice'] = $invoiceid;
    $_SESSION['payfor'] = $payfor;

    // Set cookies
    setcookie('lastname', json_encode($lastname), time() + 3600);
    setcookie('firstname', json_encode($firstname), time() + 3600);
    setcookie('email', json_encode($email), time() + 3600);
    setcookie('invoice', json_encode($invoiceid), time() + 3600);
    setcookie('payfor', json_encode($payfor), time() + 3600);

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
    if (empty($payfor)) {
        $errors[] = "Bạn chưa chọn dịch vụ nào.";
    }

    // Validate file upload
    if ($receipt['error'] == UPLOAD_ERR_NO_FILE) {
        $errors[] = "Vui lòng tải lên một tệp.";
    } elseif ($receipt['error'] != UPLOAD_ERR_OK) {
        $errors[] = "Có lỗi xảy ra khi tải lên tệp.";
    } else {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($receipt['type'], $allowedTypes)) {
            $errors[] = "Chỉ chấp nhận các tệp hình ảnh (JPEG, PNG, GIF).";
        }
    }

    // Upload directory
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadFile = $uploadDir . basename($receipt['name']);

    // Handle errors
    if (!empty($errors)) {
        echo "<h3>Form Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        // Move uploaded file and store its path in the session
        if (move_uploaded_file($receipt['tmp_name'], $uploadFile)) {
            $_SESSION['receipt'] = $uploadFile; // Store file path in session

            echo "<form>";
            echo "<h1>Bạn đã gửi thành công</h1><br>";
            echo "<p>Đây là hóa đơn của bạn:</p><br>";
            echo "<table>";
            echo "<p><b>Firstname</b>: $firstname</p>";
            echo "<p><b>Lastname</b>: $lastname</p>";
            echo "<p><b>Email</b>: $email</p>";
            echo "<p><b>Invoice ID</b>: $invoiceid</p>";
            echo "<p><b>Pay For</b>:" . htmlspecialchars(implode(', ', $payfor)) . "</p>";
            echo "</table>";
            echo "</form>";
            echo "</ul>";

            // Display uploaded image
            echo "<img src='" . htmlspecialchars($uploadFile) . "' alt='Uploaded Receipt' style='max-width: 50%; height: auto;'>";
        } 
    }
}
?>

