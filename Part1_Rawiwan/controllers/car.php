<?php
session_start(); 
require('./includes/db/ClassConnect.php');
require('./includes/db/ObjectDB.php');
require('./includes/functions.php');

if (isset($_POST['submit']) && $_GET['method'] == 'add') {
    $errors = 0;

    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $plate = $_POST['plate'];
    $cost = $_POST['cost'];
    $image = $_POST['image'];

    if ($errors > 0) {
        echo "error";
    } else {
        $data = array("brand"=>$brand, "model"=>$model, "type"=>$type, "plate"=>$plate, "cost"=>$cost, "images"=>$image);
        
        $sql = $DB->insertArray('cars', $data);
        if ($sql) {
            redirectAction('success','You have added new car ' . $carId . 'successfully','car');
        }
    }
}

if (isset($_POST['submit']) && $_GET['method'] == 'update') {
    $carId = $_POST['carId'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $plate = $_POST['plate'];
    $cost = $_POST['cost'];
    $status = $_POST['carStatus'];
    $image = $_POST['image'];
    
    $data = array("brand"=>$brand, "model"=>$model, "type"=>$type, "plate"=>$plate, "cost"=>$cost, "status"=>$status, "images"=>$image);
    $sql = $DB -> updateArray("cars",$data,"carId='".$carId."'");
    if ($sql) {
        redirectAction('success','You have updated the car ' . $carId . 'completely','car');
    }
    
}