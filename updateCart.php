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
            }
       }
    }
?>