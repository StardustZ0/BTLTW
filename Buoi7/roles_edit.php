<?php
require 'employee.php';
$role=get_all_role();
 
// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_role($id);
   // var_dump($data);
    //echo $data['employee_id'];
    foreach ($data as $row) {
    $roleid= $row['role_id'] ;
    $rolename=$row['role_name'] ;
    }
    //echo $emroleid;
    //echo $emdepartmentid;
    //lấy tên role
}
// Nếu không có dữ liệu tức không tìm thấy nhân viên cần sửa
if (!$data){
   header("location: roles_list.php");
}
 
// Nếu người dùng submit form
if (!empty($_POST['edit_role']))
{
    // Lay data
    $data['role_id']        = isset($_POST['role_id']) ? $_POST['role_id'] : '';
    $data['role_name']         = isset($_POST['role_name']) ? $_POST['role_name'] : '';
     
    // Validate thong tin
    $errors = array();
    if (empty($data['role_id'])){
        $errors['role_id'] = 'Role_id không bỏ trống';
    }
     
    if (empty($data['role_name'])){
        $errors['role_name'] = 'Role_name không bỏ trống';
    }
     
    // Nếu không có lỗi thì cập nhật
   // if (!$errors){

    edit_role($data['role_id'], $data['role_name']);
      // Trở về trang danh sách
     header("location: roles_list.php");
    }
//}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa thông tin nhân viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Sửa thông tin nhân viên </h1>
        <a href="roles_list.php">Trở về</a> <br/> <br/>
        <form method="post" action="roles_edit.php?role_id=<?php $roleid ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Role ID</td>
                    <td>
                        <input type="number" name="role_id" value="<?php echo $roleid; ?>"/>
                        <?php if (!empty($errors['role_id'])) echo $errors['role_id']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Role name</td>
                    <td>
                        <input type="text" name="role_name" value="<?php echo $rolename; ?>"/>
                        <?php if (!empty($errors['role_name'])) echo $errors['role_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" name="edit_role" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>