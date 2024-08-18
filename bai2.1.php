<html>
<head>
    <title>bai 2</title>
    <link rel="stylesheet" href="bai2.1.css">
</head>
<body>
    <?php
        echo "<table border=1 cellspacing=0 cellpading=0> 
            <tr> <td id='h1'>STT</td> <td id='h2'>Tên sách</font></td> <td id='h2'>Nội dung sách</font></td></tr> ";
        for($i=0;$i<=100;$i++){
            echo "<table border=1 cellspacing=0 cellpading=0> 
                <tr> <td id='h1'>$i</td> <td id='h2'>Tensach $i</font></td> <td id='h2'>noidung $i</font></td></tr> ";
        }  
    ?>
</body>
</html>