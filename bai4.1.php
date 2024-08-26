<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bai4.1.css">
    <title>b4.1</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["bien"];
        $numbersInput = $_POST["numbers"];
        
        $numberArray = explode(' ', $numbersInput);
        
        
        if (empty($numberArray)) {
            echo "Mảng trống.";
        } else {
            
            $maxval = max($numberArray);
            $minval = min($numberArray);
            $tongval = array_sum($numberArray);
            
           
            sort($numberArray);
            $sortedArray = $numberArray;
            
            
            $seaharr = array_search($number, $numberArray, true);
            if($seaharr == true){
                $seaharr = "tồn tại";
            }else{
                $seaharr = "không tồn tại";
            }
            
       
        }
    } 
    ?>
    <form action="bai4.1.php" method="post" name="xu_ly_mang">
        <fieldset>
            <h1>Mảng đã qua xử lý</h1>
            <?php
            echo "<p>Mảng: "; print_r($numbersInput); echo "</p>";
            echo "<p>Giá trị lớn nhất: $maxval</p>";
            echo "<p>Giá trị nhỏ nhất: $minval</p>";
            echo "<p>Tổng các phần tử: $tongval</p>";
            echo "<p>Mảng đã sắp xếp"; print_r($sortedArray); echo "</p>";
            echo "<p>$number $seaharr trong mảng</p>";
            ?>        
        </fieldset>
    </form>   
</body>
</html>
