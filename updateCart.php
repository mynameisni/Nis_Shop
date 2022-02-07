<?php
    ob_start();
    session_start();
    $conn = new mysqli ('localhost','root','','nis_shop') or die("Connection failed!");
    mysqli_query($conn, 'set names utf8');
    if (isset($_POST["id_product"]) && isset($_POST['num'])) {
        $id = $_POST["id_product"];
        if(isset($_SESSION["cart"])){
            $cart = $_SESSION["cart"];
            if (array_key_exists($id, $cart)) {
                if ($_POST["num"] > 0) {
                    $cart[$id] = array(
                        'name' => $cart[$id]["name"],
                        'image' => $cart[$id]["image"],
                        'price' => $cart[$id]["price"],
                        'number' => $_POST["num"])
                    );
                } else {
                    unset($cart[$id]);
                }
                $_SESSION["cart"] = $cart;
                foreach ($cart as $value) {
                    $total += (int)$value["number"]*(int)$value["price"];
                }
                echo $number.'-'.$total;
            }
       }
    }
?>