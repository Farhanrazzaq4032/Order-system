<style>
        .tb{
        -webkit-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        -moz-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        margin-bottom: 10px;
        margin-left: 10px;
       border-collapse: collapse;
       table-layout: fixed;
       width: 60%;
    }
    .tb td, th{
        padding: .5em;
        text-align: center;
        font-size: 20px;
    }
    .viewBtn{
        color: blue;
    }
</style>
<?php
$orderList = new OrderList();
$list = $orderList->getOrderList();
?>
<table border="1" class="tb">
    <tr>
        <th>OrderId#</th>
        <th>Customer Name</th>
        <th>Sub Total</th>
        <th>Tax</th>
        <th>Descont</th>
        <th>Grand Total</th>
        <th>Products</th>
    </tr>
    <?php
    foreach($list as $order):
    ?>
    <tr>
        <td><?php echo $order["orderId"]?></td>
        <td><?php echo $order["name"]?></td>
        <td><?php echo $order["subTotal"]?></td>
        <td><?php echo $order["tax"]?></td>
        <td><?php echo $order["discont"]?></td>
        <td><?php echo $order["grandTotal"]?></td>
        <th><a class="viewBtn" href="<?php echo URL;?>view-order?orderId=<?php echo $order["orderId"];?>">view</a></th>
    </tr>
    <?php endforeach;?>
</table>