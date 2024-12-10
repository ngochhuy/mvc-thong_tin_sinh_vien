<?php 
echo '
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Index</title>
      <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
        }
        a {
          text-decoration: none;
          color: black;
        }
          .title,h3{
            text-align: center;
          }
      </style>
    </head>
    <body>
      <h1 class = "title" >Ví dụ về mô hình MVC</h1>
      <h3><a href="Controller/C_Student.php">1. Xem thông tin sinh viên </a></h3>
      <h3><a href="Controller/C_Student.php?mod=1">2. Thêm thông tin sinh viên </a></h3>
      <h3><a href="Controller/C_Student.php?mod=2">3. Cập nhật thông tin sinh viên </a></h3>
      <h3><a href="Controller/C_Student.php?mod=3">4. Xoá sinh viên </a></h3>
      <h3><a href="Controller/C_Student.php?mod=4">5. Tìm kiếm thông tin sinh viên </a></h3>    
    </body>
  </html>
';

?>