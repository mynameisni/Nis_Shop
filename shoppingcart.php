<?php
    ob_start();
    session_start();
    try {
        $conn = new PDO("mysql:host=localhost; dbname=nis_shop",'root','');
        $conn-> query("set name utf8");
        $conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "kết nối thành công";
    } catch (PDOException $e) {
        echo "Connection failed".$e->getMessage();
    } 
    if (isset($_POST["id_product"])) {
        $id = $_POST["id_product"];
        $sql="SELECT * FROM `products` WHERE id_product=".$id; 
        $dl=$conn-> query($sql); 
        foreach ($dl as $value) {
            if(!isset($_SESSION['cart'])){
                $cart[$id] = array(
                    'name' => $value[1],
                    'image' => $value[3],
                    'price' => $value[4],
                    'number' => 1
                );
            } else {
                $cart = $_SESSION["cart"];
                if (array_key_exists($id, $cart)) {
                    $cart[$id] = array(
                        'name' => $value[1],
                        'image' => $value[3],
                        'price' => $value[4],
                        'number' => (int)$cart[$id]["number"] +1
                    );
                } else {
                    $cart[$id] = array(
                        'name' => $value[1],
                        'image' => $value[3],
                        'price' => $value[4],
                        'number' => 1
                    );
                }
            }
            $_SESSION["cart"] = $cart;
            $number = 0;
            $total = 0;
            foreach ($cart as $vl) {
                $number += (int)$vl["number"];
                $total += (int)$vl["number"]*(int)$vl["price"];
            }
            echo $number.'-'.$total;
        }
    }
?>