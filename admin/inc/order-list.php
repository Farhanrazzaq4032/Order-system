<?php require 'conf.php' ?>
<style>
    .downloadBtn {
        display: block;
        padding: 20px 30px;
        font-size: 20px;
        border-radius: 15px;
        border: 3px solid rgb(236, 230, 233);
        background-color: #b8dadf;
        cursor: pointer;
        color: rgb(180, 61, 112);
        width: 39%;
        margin-left: 10px;
        font-weight: 800;
    }
</style>
<div class="addCartList">

    <?php
    function order($orderId)
    {
        require 'conf.php';
        $query = "SELECT * FROM cus_order WHERE orderId = '$orderId'";
        $result = mysqli_query($con, $query);
        return $result;
    }

    $query = "SELECT * FROM cus_name";
    $result = mysqli_query($con, $query);
    if ($result) {
        foreach ($result as $cus) {

    ?>
            <div>
                <form action="csv.php" method="POST">
                    <h1>Name:<?php echo $cus['name'] ?></h1>
                    <h4>Order Id:<?php echo $cus['orderId'] ?></h4>
                    <?php
                    $order = order($cus["orderId"]);
                    foreach ($order as $data) {

                    ?>
                        <ul>
                            <li><img width="100px" height="100px" src="img/imresizer-1700721094035.jpg" alt=""></li>
                            <li class="dh">OrderId#<br><span class="d"><?php echo $data['orderId'] ?></span></li>
                            <li class="dh">Name<br><span class="d"><?php echo $data['proName'] ?></span></li>
                            <li class="dh">Price<br><span class="d"><?php echo $data['price'] ?></span></li>
                            <li class="dh">Description<br><span class="d"><?php echo $data['desr'] ?></span></li>
                        </ul>

            <?php
                    }
                }
            } ?>
            <button class="downloadBtn" type="submit" name="download">Download CSV</button>
                </form>
            </div>
</div>