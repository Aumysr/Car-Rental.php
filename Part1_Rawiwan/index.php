<!DOCTYPE html>
<html>
<?php
require('./includes/db/ClassConnect.php');
require('./includes/db/ObjectDB.php');
require('./includes/functions.php');
session_start();
?>

<head>
    <title></title>
    
    <link href="./styles.css" rel="stylesheet">
</head>

<body>
<div class ="header">
    <h1>Rent Buddy</h1>
    <p>Looking for a vehicle? You're at the right place. <br>Fast and easy to rent a car with Rent Buddy</p>
</div>
    <nav>
        <div class="container-fluid">
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    
                    </li>
                    <?php if (isset($_SESSION['email'])) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="./?page=rent_history">Rent History</a>
                        </li>
                    <?php } ?>
                    
                </ul>
                <?php if (isset($_SESSION['email'])) {
                    echo "Hi ", $_SESSION['name'], "<a href='actions.php?act=logout'>, logout?</a>";
                } else { ?>
                    <div style="display: flex; center;align-items: right;background: #E9E7E7;border-radius: 100px;height: 35px; margin-right:5px; gap:10px;">
                    <div>
                        <a class="button btnsecondary" aria-current="page" href="index.php">Home</a>
                        </div>
                        <div>
                            <a href="?page=register" class="button btnsecondary">Sign Up</a>
                        </div>
                        <div>
                            <a href="?page=login" class="button btnsecondary">Log In</a>
                        </div>
                        <div>
                            <a href="" class="button btnsecondary">Contact us</a>
                        </div>
                        
                    </div>

                <?php } ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <div style="width:100%; display: flex; justify-content: right;">
            <?php showMsg(); ?>
        </div>
        
        <?php include('pages.php'); ?>
    </div>


</body>

</html>