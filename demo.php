<?php
    require "dao/hang_hoa.php";
   

    $ds=hang_hoa_select_all();
    var_dump ($ds);
        
?>