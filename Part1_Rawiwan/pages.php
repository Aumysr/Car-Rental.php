
    <div style="width: 100%;">
        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == 'register' || $page == 'login') {
                    include('templates/auth/'.$page.'.php');
                } else {
                    include('templates/customer_view/'.$page.'.php');
                }
                
            } else {
                include('templates/customer_view/cars.php');
            }
            
        ?>
    </div>



