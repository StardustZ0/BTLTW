<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bai3.css">
    <title>Bài 3</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];

        function chanle($number) {
            if ($number % 2 ==0) {
                return "số chẵn";
            }
            else {
                return "số lẻ";
            }
        }
        
        function snt($number) {
            if ($number < 2) {
                return "không phải số nguyên tố";
            }
            for ($i = 2; $i <= sqrt($number); $i++) {
                if ($number % $i == 0) {
                    return "không phải số nguyên tố";
                }
            }
            return "là số nguyên tố";
    }
}

    $result = chanle($number);
    $result1 = snt($number);

    ?>

    <form action="bai3.1_2.php" method="post" name="kiem_tra_so">
        <fieldset>
            <h1>Kiểm tra số nguyên tố và số chẵn hoặc số lẻ 1 số</h1>
            <label for="" id="lb1">số nhập vào:             </label>
            <input type="text" name="number" value="<?php echo htmlspecialchars($number); ?>"> <br>

            <label for="" id="lb2">kết quả số chẵn hoặc lẻ: </label>
            <input type="text" name="result" value="<?php echo htmlspecialchars($result); ?>"> <br>

            <label for="" id="lb2">kết quả số nguyên tố:    </label>
            <input type="text" name="result" value="<?php echo htmlspecialchars($result1); ?>"> <br>

            <a href="bai3.html" target="_self">Quay lại trang trước đó</a>
        </fieldset>
    </form>
</body>

</html>