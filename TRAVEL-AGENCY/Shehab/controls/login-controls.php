<?php

    $request_payload = file_get_contents("php://input");
    $data = json_decode($request_payload);

    $email = $data->email;
    $password = $data->password;
    
    include("../models/db.config.php");

    $connection = new DB();
    $connObj = $connection->openConn();
    $userQuery = $connection->check($connObj, $email, $password);
    if($userQuery != false){
        session_start();
        $_SESSION["Manager_id"] = $userQuery;
        echo $userQuery ;
    }else{
        echo false;
    }
    $connection->closeConn($connObj);

?>