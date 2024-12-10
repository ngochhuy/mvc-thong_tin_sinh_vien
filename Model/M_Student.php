<?php 
include_once("E_Student.php");
class Model_Student{
  public function __construct() {}
  public function getAllStudent() {
    $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
    mysqli_select_db($link, "DULIEUSV");
    $sql = 'select * from `sinhvien`';
    $rs = mysqli_query($link, $sql);
    if(mysqli_num_rows($rs) == 0) return null;
    $i = 0;
    while($item = mysqli_fetch_array($rs)){
      $students[$i++] = new Entity_Student($item[0], $item[1], $item[2], $item[3]);
    }
    return $students;
  }
  public function getStudentDetail($id) {
    $allStudent = $this->getAllStudent();
    foreach ($allStudent as $student) {
      if($student->id == $id) return $student;
    }
    return null;
  }
  public function insertStudent($id, $name, $age, $university) {
    $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
    mysqli_select_db($link, "DULIEUSV");
    try {
      $sql = "insert into `sinhvien` values ('$id', '$name', $age, '$university')";
      mysqli_query($link, $sql);
      return true;
    } catch (Exception $e) {
      return false;
    }
  }
  public function updateStudent($id, $name, $age, $university) {
    $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
    mysqli_select_db($link, "DULIEUSV");
    $sql = "update `sinhvien` set `name` = '$name', `age` = $age, `university` = '$university' where `id` = '$id'";
    mysqli_query($link, $sql); 
  }
  public function deleteStudent($id) {
    $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
    mysqli_select_db($link, "DULIEUSV");
    $sql = "delete from `sinhvien` where `id` = '$id'";
    mysqli_query($link, $sql);

  }
  public function searchStudent($searchInput, $searchType) {
    $link = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den CSDL MySQL");
    mysqli_select_db($link, "DULIEUSV");
    $sql = "select * from `sinhvien` where `$searchType` like '%$searchInput%'";
    $rs = mysqli_query($link, $sql);
    if(mysqli_num_rows($rs) == 0) return null;
    $i = 0;
    while($item = mysqli_fetch_array($rs)){
      $students[$i++] = new Entity_Student($item[0], $item[1], $item[2], $item[3]);
    }
    return $students;
  }
}

?>
