<?php

function showStatus($value='') {
    if ($value == 1) {
        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' name='carStatus' value='1' checked>";
        echo "<label class='form-check-label' for='all'>Available</label></div>";

        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' name='carStatus' value='0'>";
        echo "<label class='form-check-label' for='all'>Not Available</label></div>";

        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' name='carStatus' value='2'>";
        echo "<label class='form-check-label' for='all'>Repair</label></div>";
        
    } 
    if ($value == 0 ) {
        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' name='carStatus' value='1'>";
        echo "<label class='form-check-label' for='all'>Available</label></div>";

        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' name='carStatus' value='0' checked>";
        echo "<label class='form-check-label' for='all'>Not Available</label></div>";

        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' name='carStatus' value='2'>";
        echo "<label class='form-check-label' for='all'>Repair</label></div>";
    }

    if ($value == 2 ) {
        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' name='carStatus' value='1'>";
        echo "<label class='form-check-label' for='all'>Available</label></div>";

        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' name='carStatus' value='0'>";
        echo "<label class='form-check-label' for='all'>Not Available</label></div>";

        echo "<div class='form-check form-check-inline'>";
        echo "<input class='form-check-input' type='radio' name='carStatus' value='2' checked>";
        echo "<label class='form-check-label' for='all'>Repair</label></div>";
    }
    
    return;
}

function emailValidation($email) {
    if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        return $email;
    } else {
        return false;
    }
}

function calcTotalDay($date1, $date2) {
    $diff = date_diff(date_create($date1), date_create($date2));
    $totalDay = $diff->format("%a");
    
    return $totalDay;
}

function redirectAction($type, $msg, $redirectPage) {
    if ($type == 'error') {
        $_SESSION['error'] = $msg;
    } else {
        $_SESSION['success'] = $msg;
    }

    if (isset($_SESSION['admin_page'])) {
        if (empty($redirectPage)) {
            echo "<META http-equiv=\"refresh\" content=\"0;URL=./templates/admin\">";
        } else {
            echo "<META http-equiv=\"refresh\" content=\"0;URL=./templates/admin/?page=$redirectPage\">";
        }
    } else {
        if (empty($redirectPage)) {
            echo "<META http-equiv=\"refresh\" content=\"0;URL=./\">";
        } else {
            echo "<META http-equiv=\"refresh\" content=\"0;URL=./?page=$redirectPage\"/>";
        }
    }
    exit;
    return;
}

function showMsg(){
    if (isset($_SESSION['error']) || isset($_SESSION['success'])) {
        if (empty($_SESSION['error'])) {
            echo "<div class='mt-3' style='background: #27b227; width: 250px; padding: 10px 15px; border-radius: 10px; color: #fff;'>". $_SESSION['success'] . "</div>";
        } else {
            echo "<div class='mt-3' style='background: #dd4343; width: 250px; padding: 10px 15px; border-radius: 10px; color: #fff;'> ". $_SESSION['error'] . "</div>";
        }
        unset($_SESSION['error']);
        unset($_SESSION['success']);
    }
}