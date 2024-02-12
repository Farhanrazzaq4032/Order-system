<?php require 'conf.php' ?>
<?php session_start(); ?>


<?php
if (isset($_POST['add'])) {
    $proName = $_POST['proName'];
    $price = $_POST['price'];
    $desr = $_POST['desr'];
    $pro_code = $_POST["pro_code"];
    if ($proName == "" && $price == "" && $desr == "" && $pro_code == "") {
        $_SESSION["status"] = "Please Fill all the field";
        header('Location: add-product.php');

    } else {
        $query = "SELECT * FROM product WHERE pro_code = '$pro_code'";
        $run = mysqli_query($con, $query);
        if (mysqli_num_rows($run) > 0) {
            $_SESSION["status"] = "Already Product code";
            header('Location: add-product.php');
        } else {
            $query = "INSERT INTO product (name, price, desr, pro_code) VALUES ('$proName', '$price', '$desr', '$pro_code')";
            $run = mysqli_query($con, $query);
            if ($run) {
                $_SESSION["status"] = "Product added";
                header('Location: index.php');
            } else
                $_SESSION["status"] = "Something wrong";
                header('Location: add-product.php');
        }
    }
}

?>