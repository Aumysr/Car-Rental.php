<?php
session_start(); 
require('./includes/db/ClassConnect.php');
require('./includes/db/ObjectDB.php');
require('./includes/functions.php');
date_default_timezone_set('Australia/Sydney');

if (isset($_POST['submit']) && $_GET['method'] == 'rent_car') {
    $errors = 0;

    $user = $_SESSION['uid'];
    $carId = $_POST['carId'];
    $price = $_POST['cost'];
    $startDate = date("Y-m-d",strtotime($_POST['startDate']));
    $estReturnDate = date("Y-m-d",strtotime($_POST['returnDate']));
    $createDate = date("Y-m-d");
    $totalDay = calcTotalDay($startDate, $estReturnDate);
    $totalPrice = intval($totalDay) * floatval($price);

    if ($errors > 0) {
        echo "error";
    } else {
        $data = array("carId"=>$carId, "userId"=>$user, "totalDay"=>$totalDay, "price"=>$price, "totalPrice"=>$totalPrice, 
                        "createDate"=>$createDate, "startDate"=>$startDate, "estReturnDate"=>$estReturnDate);
        
        $sql = $DB->insertArray('rent_transaction', $data);

        $data1 = array("status"=>0);
        $sql1 = $DB -> updateArray("cars",$data1,"carId='".$carId."'");
        if ($sql) {
            redirectAction('success','You have booked the car successfully','rent_history');    
        }
    }

}

if (isset($_POST['submit']) && $_GET['method'] == 'update_return') {
    $transId = $_POST['transId'];
    $custName = $_POST['name'];
    $carId = $_POST['carId'];
    $returnDate = date("Y-m-d");

    $data = array("isReturn"=>1, "returnDate"=>$returnDate);
    $sql = $DB -> updateArray("rent_transaction",$data,"id='".$transId."'");
    $data1 = array("status"=>1);
    $sql1 = $DB -> updateArray("cars",$data1,"carId='".$carId."'");
    if ($sql) {
        redirectAction('success','The customer name ' . $custName . 'has returned the car','return');
    }
}