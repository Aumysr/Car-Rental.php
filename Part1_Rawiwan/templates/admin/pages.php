
    <div style="width: 100%;">
        <div>
            <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    if ($page) {
                        if ($page == '' || $page == 'car' || $page == 'add_car' || $page == 'edit_car') {
                            include('templates/car/'.$page.'.php');
                        } else {
                            include('templates/'.$page.'.php');
                        }
                        
                    } else {
                        echo "<h3 class='mt-3' style='text-align: center;'>Hi " .$_SESSION['name']. ", This is admin rent buddy dashboard</h3>";
                    }
                    
                } else {
                    echo "<h3 class='mt-3' style='text-align: center;'>Hi " .$_SESSION['name']. ", This is admin rent buddy dashboard</h3>";
                }
                
            ?>
        </div>
    </div></div>


