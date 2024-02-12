<style>
    input {
        border: none;
        padding: 20px;
        border-radius: 10px;
        -webkit-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        -moz-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        margin-bottom: 10px;
        margin-left: 10px;
    }

    input:focus {
        outline: none;
    }

    .tb{
        -webkit-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        -moz-box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        box-shadow: 9px 9px 12px -12px rgba(66, 68, 90, 1);
        margin-bottom: 10px;
        margin-left: 10px;
       border-collapse: collapse;
       table-layout: fixed;
       width: 39%;
    }
    .tb td, th{
        padding: .3em 0;
        text-align: center;
        font-size: 20px;
    }
</style>
<div class="addCartList">
    <div>
        <?php
        $addToCart = new addToCart();
        if (!empty($_SESSION['carts'])) {
            $subTotal = 0;
            foreach ($_SESSION["carts"] as $items) {
                $totalPrice = $items["proPrice"] * $items["proQty"];
                $subTotal += $totalPrice;

        ?>
                <ul>
                    <li><img width="100px" height="100px" src="img/imresizer-1700721094035.jpg" alt=""></li>
                    <li class="dh">Name<br><span class="d"><?php echo $items["proName"] ?></span></li>
                    <li class="dh">RS<br><span class="d"><?php echo $items["proPrice"] ?></span></li>
                    <li class="dh">Totla Price<br><span class="d"><?php echo $totalPrice ?></span></li>
                    <li class="dh">Description<br><span class="d"><?php echo $items["proDesr"] ?></span></li>
                    
                </ul>
            <?php } ?>
            <form action="<?php echo URL; ?>cus-order" method="POST">
                <?php
                $clc = $addToCart->Clc($subTotal);
                ?>
                <table border="1" class="tb">
                    <tr>
                        <th colspan="2">SubTotoal</th>
                        <th colspan="2">Tax</th>
                        <th colspan="2">Discont</th>
                        <th colspan="2">Final Price</th>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo $clc["subTotal"] ?></td>
                        <td colspan="2"><?php echo $clc["totalTax"] ?></td>
                        <td colspan="2"><?php echo $clc["totalDiscont"] ?></td>
                        <td colspan="2"><?php echo $clc["grandTotal"] ?></td>
                    </tr>
                </table>
                <input type="text" name="name" placeholder="Enter You Name">
                <input type="hidden" name="subTotal" value="<?php echo $clc["subTotal"] ?>">
                <button class="orderBtn" type="submit" name="order">Order</button>
                <button class="orderBtn" type="submit" name="cancel">Cancel</button>
            </form>
        <?php
        } else
            set_flash("No Product add in Cart");
        echo flash("msg");
        ?>
    </div>
</div>