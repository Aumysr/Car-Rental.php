<?php
    $act = $_GET['act'];
    
    if ( !$act) {
  
        echo "error";
    }
    
    if ($act) {
        $file = 'controllers/'.$act.'.php';
        
            if ( file_exists( $file ) ) {
                
                include( $file );
              } else {
                echo "file cannot be found";
            }
    }

