<?php
class OrderList extends DB{
        private $orderList;
        private $productList;

        function setOrderList(){
            $query = "SELECT * FROM cus_name";
            $this->orderList = $this->select($query);
        }
        function setProList($orderId){
            $query = "SELECT * FROM cus_order WHERE orderId = '$orderId'";
            $this->productList = $this->select($query);
        }
        function getOrderList(){
            $this->setOrderList();
            return $this->orderList;
        }
        function getProList($orderId){
            $this->setProList($orderId);
            return $this->productList;
        }

}