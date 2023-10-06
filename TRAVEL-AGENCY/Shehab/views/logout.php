<?php

    session_start();
    setcookie("signed-in", "", time() - 3600);
    session_destroy();

    header("location:home.php");
    

?>