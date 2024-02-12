<?php require 'conf.php' ?>

<?php
if (isset($_POST["download"])) {
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=data.csv");
    $fh = fopen('php://output', 'w');
    fputcsv($fh, array('id', 'orderId', 'Product Name', 'Price', 'description', 'time', 'time'));
    $query = "SELECT *FROM cus_order";
    $result = mysqli_query($con, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
        fputcsv($fh, $rows);
    }
    fclose($fh);
}
?>