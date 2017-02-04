<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text');
require_once '../services/class.BagelDao.inc';
if(isset($_GET['request'])) {
    $req = $_GET['request'];
    $dao = new BagelDao();
    if($req === "placeorder") {
        echo $dao->placeorder($_GET['uname'], $_GET['order'], $_GET['total'], $_GET['address'], $_GET['city'], $_GET['state'], $_GET['zipcode'])? "success" :"failed" ;
    } else if($req === "deliver"){
        echo $dao->deliver($_GET['oid']) ? "success" : "failed";      
    }
} 