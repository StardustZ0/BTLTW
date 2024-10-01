<?php
require './libs/students.php';
if (!empty($_POST['add_student'])) {
    // Lấy dữ liệu
    $data['sv_name']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['sv_sex']         = isset($_POST['sex']) ? $_POST['sex'] : '';
    $data['sv_birthday']    = isset($_POST['birthday']) ? $_POST['birthday'] : '';    
    $errors = array();
    if (empty($data['sv_name'])) {
        $errors['sv_name'] = 'Chưa nhập tên sinh viên';
    }     
    if (empty($data['sv_sex'])) {
        $errors['sv_sex'] = 'Chưa nhập giới tính sinh viên';
    }
     
    if (!$errors) {
        add_student($data['sv_name'], $data['sv_sex'], $data['sv_birthday']);
        header("Location: students_list.php");
        exit;
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
</head>
<body>
    <h1>Thêm sinh viên</h1>
    <a href="students_list.php">Trở về</a> <br/><br/>
    <form method="post" action="students_add.php">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" value="<?php echo htmlspecialchars(!empty($data['sv_name']) ? $data['sv_name'] : ''); ?>"/>
                    <?php if (!empty($errors['sv_name'])) echo $errors['sv_name']; ?>
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <select name="sex">
                        <option value="Nam">Nam</option>
                        <option value="Nữ" <?php if (!empty($data['sv_sex']) && $data['sv_sex'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                    </select>
                    <?php if (!empty($errors['sv_sex'])) echo $errors['sv_sex']; ?>
                </td>
            </tr>
            <tr>
                <td>Birthday</td>
                <td>
                    <input type="date" name="birthday" value="<?php echo htmlspecialchars(!empty($data['sv_birthday']) ? $data['sv_birthday'] : ''); ?>"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="add_student" value="Lưu"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>