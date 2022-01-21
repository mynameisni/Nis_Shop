<?php  
    $conn = new mysqli ('localhost','root','','nis_shop') or die("Connection failed!");
    mysqli_query($conn, 'set names utf8');

        $sqlDelete = "DELETE a.*, b.* FROM products a LEFT JOIN category b ON b.id_category = a.id_category WHERE a.id_category=".$_GET['id'];
        print_r($sqlDelete);
        mysqli_query($conn,$sqlDelete) or die("Error");
    		header('location:category.php');
 ?>