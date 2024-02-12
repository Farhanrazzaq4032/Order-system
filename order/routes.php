<?php
if (set_segment(1) == "cart-list") {
    include INC . "cart.php";
} elseif (set_segment(1) == "add-to-cart") {
    include INC . "add-to-cart.php";
} elseif (set_segment(1) == "cus-order") {
    include INC . "cus-order.php";
} elseif (set_segment(1) == "cart") {
    include INC . "cart.php";
} elseif (set_segment(1) == "farhan-admin") {
    include INC . "farhan-admin.php";
} elseif (set_segment(1) == "view-order") {
    include INC . "view-order.php";
} else
    include INC . "userd.php";
