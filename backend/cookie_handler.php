<?php 
    function updateQuantity($pid,$quantity){
        $cookie_data = stripslashes($_COOKIE['cartitem']);
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]['item_id'] == $pid) {
                unset($cart_data[$keys]);
                $item_array = array("item_id" => $pid, "item_quantity" => $quantity);
                $cart_data[] = $item_array;
                $item_data = json_encode($cart_data);
                setcookie('cartitem', $item_data, time() + (86400 * 30));
            }
        }
    }

    function removeProduct($pid){
        $cookie_data = stripslashes($_COOKIE['cartitem']);
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]['item_id'] == $pid) {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie('cartitem', $item_data, time() + (86400 * 30));
            }
        }
    }

    function removeAllProduct(){
        setcookie('cartitem', "", time() - 3600);
    }
?>