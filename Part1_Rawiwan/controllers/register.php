<?php
session_start(); 
require('./includes/db/ClassConnect.php');
require('./includes/db/ObjectDB.php'); 
require('./includes/functions.php'); 

if (isset($_POST['submit'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $levelId = $_POST['levelId'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (!$firstName || !$lastName || !$phone || !$email || !$levelId || !$password || !$confirmPassword) {
        redirectAction('error','Fields cannot be empty', 'register');
    }

    if (!emailValidation($email)) {
        redirectAction('error','Invalid email format', 'register');
    }

    if ($password <> $confirmPassword) {
        redirectAction('error','Password and Confirm password does not match', 'register');
    };

    $sqlCheckEmail = $DB -> selectOneRow("SELECT email FROM users WHERE email='$email'");

    if ($sqlCheckEmail) {
        redirectAction('error','Email is already taken', 'register');
    } else {    
        $data = array("firstName"=>$firstName, "lastName"=>$lastName, "phone"=>$phone, "email"=>$email, "levelId"=>$levelId, "password"=>md5($password));
        
        $sql = $DB->insertArray('users', $data);
        if ($sql) {
            $_SESSION['uid'] = $DB->insertId();
            $_SESSION['name'] = $firstName . " " . $lastName;
            $_SESSION['email'] = $email;
            $_SESSION['levelId'] = $levelId;
            redirectAction('success','Register success','');
        }
    }
}