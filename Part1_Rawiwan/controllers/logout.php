<?php
    session_start();
    require('./includes/functions.php');
    if (isset($_SESSION['admin_page'])) {
        unset($_SESSION['admin_page']);
    }
    unset($_SESSION['email']);
    unset($_SESSION['uid']);
    unset($_SESSION['level']);
    unset($_SESSION['name']);
    session_unset();
    session_destroy();

    redirectAction('success','You have logged out','');
  
