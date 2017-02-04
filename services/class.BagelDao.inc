<?php

require_once 'class.Database.inc';

class BagelDao {

    private $mysqli;

    public function __construct() {
        $this->mysqli = Database::getInstance()->getConnection();
    }

    public function placeorder($uname, $order, $total, $address, $city, $state, $zipcode) {
        try {

            $result = $this->mysqli->query("select count(order_id) as c from orders");
            $row = $result->fetch_assoc();
            $count = $row['c'];
            $oid = 1;
            if ($count > 0) {
                $result = $this->mysqli->query("select max(order_id) as m from orders");
                $row = $result->fetch_assoc();
                $oid = $row['m'] + 1;
            }
            $orders = explode("_", $order);

            for ($i = 0; $i < sizeof($orders); $i++) {
                $item = explode(":", $orders[$i]);
                $this->mysqli->query("insert into orders_items (order_id,items_id,cost) values ($oid,$item[0],$item[1])");
            }
            $date = date('y/m/d');
            $tot = (int) $total;
            $res = $this->mysqli->query("insert into orders(customer_id,total_cost,order_date,address,city,state,zip,status) values ('$uname','$tot','$date','$address','$city','$state','$zipcode','pending')");
            return $res;
        } catch (Exception $ex) {
            trigger_error($ex->getMessage());
            return false;
        }
    }

    public function deliver($oid) {
        try {
            $sql = "update orders set status = 'delivered' where order_id=$oid";
            return $this->mysqli->query($sql);
        } catch (Exception $ex) {
            trigger_error($ex->getMessage());
            return false;
        }
    }

}
