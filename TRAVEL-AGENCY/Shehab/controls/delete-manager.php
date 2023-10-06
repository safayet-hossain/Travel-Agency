<?php

    $request_payload = file_get_contents("php://input");
    $data = json_decode($request_payload);
    $userID = $data->userID;
    include("../models/db.config.php");
    $connection = new DB();
    $connObj = $connection->openConn();
    $userQuery = $connection->delete($connObj, $userID);
    
    $connection->closeConn($connObj);

?>