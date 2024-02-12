<?php
// echo __DIR__."<br>";
ob_start();
session_start();
//root Directory
define("BASE_PATH", __DIR__."/");
//inc tmp
define("TMP", BASE_PATH."tmp/");
//inc Directory
define("INC", BASE_PATH. "inc/");
//helpers Directory
define("HELPERS", BASE_PATH."helper/");
//OBJ Directory
define("OBJ", BASE_PATH."obj/");
//URl Directory
define("URL", "http://".$_SERVER["HTTP_HOST"]."/php/order/");


include TMP. "header.php";

include BASE_PATH. "conf.php";
include OBJ. "DB.php";
include OBJ. "Order.php";
include OBJ. "AddToCart.php";
include OBJ. "OrderList.php";
include HELPERS. "func.php";

include BASE_PATH. "routes.php";


include TMP. "footer.php";
?>