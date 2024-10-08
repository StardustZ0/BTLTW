<?php
require 'employee.php';
$roles = get_all_department();
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>       
        <title>department list</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Danh sách phòng ban</h2>
        <a href="department_add.php">Thêm</a> <br/> <br/>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td><b>ID</b></td>
                <td>Department Name</td>
                <td>Chọn thao tác</td>
            </tr>
            <?php foreach ($roles as $item){ ?>
            <tr>
                <td><?php echo $item['department_id']; ?></td>
                <td><?php echo $item['department_name']; ?></td>
                <td>
                    <form method="post" action="department_delete.php">
                        <input onclick="window.location = 'department_edit.php?id=<?php echo $item['department_id']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $item['department_id']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="roles_list.php">bảng chức vụ</a> <br/> <br/>
    </body>
</html>