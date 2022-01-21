<?php  
    $conn = new mysqli ('localhost','root','','nis_shop') or die("Connection failed!");
    mysqli_query($conn, 'set names utf8');

    $sqlDelete = "DELETE FROM products WHERE id_product=".$_GET['id_product'];
    print_r($sqlDelete);
    mysqli_query($conn,$sqlDelete) or die("Error");
    header('location: products.php');
 ?>