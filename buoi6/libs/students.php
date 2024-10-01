<?php 
global $conn;
function connect_db()
{
    global $conn;
    if (!$conn) {
        try {
            $conn = new PDO("mysql:host=sql110.infinityfree.com;dbname=if0_37102118_qlsinhvien;charset=utf8", "if0_37102118", "Quan190904");
            // Thiết lập chế độ lỗi PDO
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Can't not connect to database: " . $e->getMessage());
        }
    }
}
function disconnect_db()
{
    global $conn;
    $conn = null;
}

function get_all_students()
{
    global $conn;

    connect_db();

    $sql = "SELECT * FROM sinhvien";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function get_student($student_id)
{
    global $conn;

    connect_db();

    $sql = "SELECT * FROM sinhvien WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function add_student($student_name, $student_sex, $student_birthday)
{
    global $conn;

    connect_db();

    $sql = "INSERT INTO sinhvien (hoten, gioitinh, ngaysinh) VALUES (:name, :sex, :birthday)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $student_name);
    $stmt->bindParam(':sex', $student_sex);
    $stmt->bindParam(':birthday', $student_birthday);
    
    return $stmt->execute();
}
function edit_student($student_id, $student_name, $student_sex, $student_birthday)
{
    global $conn;

    connect_db();

    $sql = "UPDATE sinhvien SET hoten = :name, gioitinh = :sex, ngaysinh = :birthday WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $student_name);
    $stmt->bindParam(':sex', $student_sex);
    $stmt->bindParam(':birthday', $student_birthday);

    return $stmt->execute();
}
function delete_student($student_id)
{
    global $conn;

    connect_db();

    $sql = "DELETE FROM sinhvien WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);

    return $stmt->execute();
}
?>