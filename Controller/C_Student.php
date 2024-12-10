<?php
include_once('./../Model/M_Student.php');
class Ctrl_Student{
  public function invoke()
  {
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      if(isset($_GET['action']) && $_GET['action'] == 'add'){
        $modelStudent = new Model_Student();
        if($modelStudent->insertStudent($_POST['id'], $_POST['name'], $_POST['age'], $_POST['university'])){
          $studentList = $modelStudent->getAllStudent();
          if ($studentList === null) {
            $studentList = [];
          }
          include_once("../View/StudentList.html");
        }else{
          session_start();
          $_SESSION['error'] = "Sinh viên đã tồn tại";
          include_once("../View/StudentForm.html");
        }
      }else if(isset($_GET['action']) && $_GET['action'] == 'search'){
        $searchType = "";
        if(isset($_POST['searchType'])){
          if($_POST['searchType'] == "id"){
            $searchType = "id";
          }else if($_POST['searchType'] == "name"){
            $searchType = "name"; 
          }else if($_POST['searchType'] == "age"){
            $searchType = "age";
          }else if($_POST['searchType'] == "university"){
            $searchType = "university";
          }
        }
        $modelStudent = new Model_Student();
        $studentList = $modelStudent->searchStudent($_POST['searchInput'], $searchType);
        // neu loi khong tim thay sinh vien nao thi hien thi form search
        if($studentList ==  null){
          session_start();
          $_SESSION['searchError'] = "Không tìm thấy sinh viên nào";
          include_once("../View/StudentSearch.html");
        }else{
          include_once("../View/StudentList.html");
        }
      }
      else{
        // update student
        $modelStudent = new Model_Student();
        $modelStudent->updateStudent($_POST['id'] , $_POST['name'], $_POST['age'], $_POST['university']);
        $studentList = $modelStudent->getAllStudent();
        if ($studentList === null) {
          $studentList = [];
        }
        include_once("../View/StudentList.html");
      }
    }else if(isset($_GET['mod']) ){
      if($_GET['mod'] == 1){
        include_once("../View/StudentForm.html");
      }else if($_GET['mod'] == 2){
        $modelStudent = new Model_Student();
        $studentList = $modelStudent->getAllStudent();
        if ($studentList === null) {
          $studentList = [];
        }
        include_once("../View/StudentList.html");
      }else if($_GET['mod'] == 3){
        $modelStudent = new Model_Student();
        $studentList = $modelStudent->getAllStudent();
        if ($studentList === null) {
          $studentList = [];
        }
        include_once("../View/StudentList.html");
      }else if($_GET['mod'] == 4){
        include_once("../View/StudentSearch.html");
      }
    }else if(isset($_GET['action'])){
      if($_GET['action'] == 'delete'){
        $modelStudent = new Model_Student();
        $modelStudent->deleteStudent($_GET['id']);
        $studentList = $modelStudent->getAllStudent();
        if ($studentList === null) {
          $studentList = [];
        }
        include_once("../View/StudentList.html");
      }else if($_GET['action'] == 'update'){
        $id = $_GET['id'];
        $modelStudent = new Model_Student();
        $student = $modelStudent->getStudentDetail($id);
        include_once("../View/StudentForm.html");
      }
    }else{
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $modelStudent = new Model_Student();
        $student = $modelStudent->getStudentDetail($id);
        include_once("../View/StudentDetail.html");
      }else{
        $modelStudent = new Model_Student();
        $studentList = $modelStudent->getAllStudent();
        include_once("../View/StudentList.html");
      }
    }
  }
}
$C_Student = new Ctrl_Student();
$C_Student->invoke();
?>