<style>
        .tb{
        -webkit-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        -moz-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        margin-bottom: 10px;
        margin-left: 10px;
       border-collapse: collapse;
       table-layout: fixed;
       /* width: 39%; */
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
$list = $orderList->getProList($_GET["orderId"]);
?>
<table border="1" class="tb">
    <tr>
        <th>OrderId#</th>
        <th>Product Code</th>
        <th>Product Name</th>
        <th>Pirce</th>
        <th>qty</th>
        <th>Total Price</th>
        <th>Description</th>
    </tr>
    <?php
    foreach($list as $order):
    ?>
    <tr>
        <td><?php echo $order["orderId"]?></td>
        <td><?php echo $order["pro_code"]?></td>
        <td><?php echo $order["proName"]?></td>
        <td><?php echo $order["price"]?></td>
        <td><?php echo $order["qty"]?></td>
        <td><?php echo $order["qty"]*$order["price"]?></td>
        <td><?php echo $order["desr"]?></td>
    </tr>
    <?php endforeach;?>
</table>