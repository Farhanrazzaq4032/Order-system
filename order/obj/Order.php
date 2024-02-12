<?php
class Order extends DB
{
    private $name;
    private $order;
    private $orderId;
    private $clc;

    function set($name, $subTotal)
    {
        $this->name = clean_string($name);
        $this->order = $_SESSION['carts'];
        $this->orderId = rand(1000, 20000);
        $addToCart = new addToCart();
        $this->clc = $addToCart->Clc($subTotal);
    }

    function creOrder()
    {
        if (!$this->name == "") {
            $subTotal = $this->clc["subTotal"];
            $tax = $this->clc["totalTax"];
            $discont = $this->clc["totalDiscont"];
            $grandTotal = $this->clc["grandTotal"];
            $query = "INSERT INTO cus_name (orderId, name, subTotal, tax, discont, grandTotal) VALUES ('$this->orderId', '$this->name', '$subTotal', '$tax', '$discont','$grandTotal')";
            $result = $this->insert($query);
            if ($result) {
                foreach ($this->order as $items) {
                    $proName = $items['proName'];
                    $price = $items['proPrice'];
                    $qty = $items['proQty'];
                    $desr = $items['proDesr'];
                    $pro_code = $items['pro_code'];
                    $query = "INSERT INTO cus_order (orderId, pro_code, proName, price, qty, desr) VALUES ('$this->orderId', '$pro_code', '$proName', '$price', '$qty', '$desr')";
                    $result = $this->insert($query);
                }
                if ($result) {
                    set_flash("Order successfull");
                    unset($_SESSION['carts']);
                } else {
                    set_flash("Order Failed");
                }
            } else {
                set_flash("Order Failed");
            }
        } else {
            set_flash("Enter Your Name");
            redirect("cart");
        }
    }

    function order($name, $subTotal)
    {
        $this->set($name, $subTotal);
        $this->creOrder();
    }
}

