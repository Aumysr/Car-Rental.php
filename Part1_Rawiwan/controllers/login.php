<?php
session_start(); 
require('./includes/db/ClassConnect.php');
require('./includes/db/ObjectDB.php'); 
require('./includes/functions.php');

$email = $_POST['email'];
$password = $_POST['password'];
$errors = 0;

$sql = $DB -> selectOneRow("SELECT userId, firstName, lastName, email, levelId FROM users WHERE email='$email' AND `password` = '" .md5($password). "'");

if ($sql) {
    $_SESSION['uid'] = $sql['userId'];
    $_SESSION['email'] = $email;
    $_SESSION['level'] = $sql['levelId'];
    $_SESSION['name'] = $sql['firstName'] . " " . $sql['lastName'];

    if ($sql['levelId'] == 1) {
        $_SESSION['admin_page'] = true;
        redirectAction('success','Login success','');
    } else {
        redirectAction('success','Login success','');
    }

    
} else {
    echo "Login error";
}


