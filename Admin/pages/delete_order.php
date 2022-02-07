<?php  
    $conn = new mysqli ('localhost','root','','nis_shop') or die("Connection failed!");
    mysqli_query($conn, 'set names utf8');

    $sqlDelete = "DELETE a.*, b.* FROM orders a LEFT JOIN order_detail b ON b.id_order = a.id_order WHERE a.id_order=".$_GET['id_order'];
    mysqli_query($conn,$sqlDelete) or die("Error");
    header('location: orders.php');
 ?>