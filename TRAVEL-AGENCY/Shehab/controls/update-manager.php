<?php

    $request_payload = file_get_contents("php://input");
    $data = json_decode($request_payload);
    // $userID = $data->userID;
    //echo json_encode($data->request);
    $id = $data->request->id;
    $username = $data->request->username;
    $email = $data->request->email;
    $password = $data->request->password;
    $gender = $data->request->gender;
    $contact = $data->request->contact;
    $address = $data->request->address;
    $birthday = $data->request->birthday;

    //echo json_encode(["username"=>$username]);

    include("../models/db.config.php");
    $connection = new DB();
    $connObj = $connection->openConn();
    $userQuery = $connection->updateManager($connObj, $id, $username, $email, $password, 
    $gender, $birthday, $address, $contact );
    $connection->closeConn($connObj);

?>