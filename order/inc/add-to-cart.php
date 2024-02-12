<?php
if (check_method("post")) {
        $Pro_code = $_POST["pro_code"];
        $addToCart = new addToCart();
        $addToCart->add($Pro_code);
}
