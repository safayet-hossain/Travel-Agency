<?php

    $request_payload = file_get_contents("php://input");
    $data = json_decode($request_payload);
    
    $username = $data->username;
    $email = $data->email;
    $password = $data->password;
    $gender = $data->gender;
    $birthday = $data->birthday;
    $address = $data->address;
    $contact = $data->contact;

    include("../models/db.config.php");

    $connection = new DB();
    $connObj = $connection->openConn();
    $userQuery = $connection->insert(
        $connObj, $username, $email, $password, $gender, $birthday, $address, $contact);
    $connection->closeConn($connObj);
    


?>