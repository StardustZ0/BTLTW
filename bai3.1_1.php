<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bai3.css">
    <title>bai 3</title>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number1 = $_POST["number1"];
        $number2 = $_POST["number2"];
        $math = $_POST["math"];
        $result = 0;
        switch ($math) {
            case "cộng":
                $result = $number1 + $number2;
                break;
            case "trừ":
                $result = $number1 - $number2;
                break;
            case "nhân":
                $result = $number1 * $number2;
                break;
            case "chia":
                if ($number2 == 0) {
                    $result = "không thể chia cho 0";
                } else
                    $result = $number1 / $number2;
                break;
        }
    }
    ?>

    <form action="bai3.1_1.php" method="post" name="cac_phep_tinh_co_ban">
        <fieldset>
            <h1>Phép tính trên hai số</h1>

            <label for="" id="lb1" >chọn phép tính: </label>
            <span class="large-text"><?php echo htmlspecialchars($math) ?></span> <br>

            <label for="" id="lb2">số thứ nhất: </label>
            <input type="text" name="number1" id="ip1" value="<?php echo htmlspecialchars($number1); ?>"> <br>

            <label for="" id="lb2">số thứ hai:  </label>
            <input type="text" name="number2" id="ip1" value="<?php echo htmlspecialchars($number2); ?>"> <br>

            <label for="" id="lb2">kết quả: </label>
            <input type="text" name="result" id="ip1" value="<?php echo htmlspecialchars($result); ?>"> <br>

            <a href="bai3.html" target="_self">Quay lại trang trước đó</a>
        </fieldset>

    </form>
</body>

</html>