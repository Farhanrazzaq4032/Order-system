<?php
if (check_method("post")) {
        if (isset($_POST['order'])) {
                $order = new Order();
                $order->order($_POST['name'], $_POST["subTotal"]);
                header('Location: index.php');
                exit();
        }
        unset($_SESSION["carts"]);
        set_flash("Order Cancel");
        header('Location: index.php');
        exit();
}
