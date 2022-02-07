<?php
    ob_start();
    session_start();
    $conn = new mysqli ('localhost','root','','nis_shop') or die("Connection failed!");
    mysqli_query($conn, 'set names utf8');

    if (isset($_POST["id_product"])) {
        $id = $_POST["id_product"];
        $sqlSelect = "SELECT * FROM `products` WHERE id_product=".$id; 
        $result = mysqli_query($conn, $sqlSelect); 
        $row = mysqli_fetch_assoc($result);

        if(!isset($_SESSION['cart'])){
            $cart[$id] = array(
                'name' => $row['product_name'],
                'image' => $row['image'],
                'price' => $row['price'],
                'number' => 1
            );
        } else {
            $cart = $_SESSION["cart"];
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array(
                    'name' => $row['product_name'],
                    'image' => $row['image'],
                    'price' => $row['price'],
                    'number' => (int)$cart[$id]["number"] +1
                );
            } else {
                $cart[$id] = array(
                    'name' => $row['product_name'],
                    'image' => $row['image'],
                    'price' => $row['price'],
                    'number' => 1
                );
            }
        }

        $_SESSION["cart"] = $cart;
        $number = 0;
        $total = 0;
        foreach ($cart as $value) {
            $number += (int)$value["number"];
            $total += (int)$value["number"]*(int)$value["price"];
        }
        echo $number.'-'.$total;
    }
?>