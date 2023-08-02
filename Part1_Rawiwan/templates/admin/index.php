<?php
    session_start();
    require('../../includes/db/ClassConnect.php');
    require('../../includes/db/ObjectDB.php');
    require('../../includes/functions.php');
    
?>

<?php
    if ($_SESSION['level'] == 0) {
        echo "<p>You are not authorised on this page</p>";
        echo "<p><a href='../../'>Click here to go back to main page</a></p>";
        return;
    }
        
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" />
    <style>
        ul {
            list-style: none;
        }
    </style>
</head>
<body>
    <div>
        
        <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=car">All Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=car">Insert & Edit Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=car_list">Car status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./?page=return">Returning Car</a>
                    </li>
                </ul>
                <?php if (isset($_SESSION['email'])) {
                    echo "Hi ", $_SESSION['name'], "<a href='../../actions.php?act=logout'>, logout?</a>";
                } else { ?>
                    <div style="display: flex;justify-content: center;align-items: center;background: #E9E7E7;border-radius: 60px;height: 35px; margin-right:5px;">
                        <div>
                            <a href="./templates/auth/register.php" class="button btnsecondary">Sign Up</a>
                        </div>
                        <div>
                            <a href="./templates/auth/login.php" class="button btnsecondary">Login</a>
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
        <?php
            if (!isset($_SESSION['email' ])) {
                include('../auth/login.php');
            } else {
                include('pages.php');
                
            }
        ?>