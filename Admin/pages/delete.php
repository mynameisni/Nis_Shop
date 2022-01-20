<?php  
  $conn = new mysqli ('localhost','root','','nis_shop') or die("không thể kết nối tới cơ sở dữ liệu!");
  mysqli_query($conn, 'set names utf8');

    $sqlDelete = "DELETE FROM `category` WHERE `id_category`=".$_GET['id'];
    print_r($sqlDelete);
    mysqli_query($conn,$sqlDelete) or die("Error");
		header('location:category.php');
 ?>