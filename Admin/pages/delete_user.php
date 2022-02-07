<?php  
    $conn = new mysqli ('localhost','root','','nis_shop') or die("Connection failed!");
    mysqli_query($conn, 'set names utf8');

        $sqlDelete = "DELETE FROM user WHERE id_user=".$_GET['id_user'];
        mysqli_query($conn,$sqlDelete) or die("Error");
        header('location: users.php');
 ?>