<?php
    
    session_start();
    
    if(! isset($_SESSION["Manager_id"])){
        header("location:logout.php");
    }


?>