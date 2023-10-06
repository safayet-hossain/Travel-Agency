<?php

    class DB{
        //-----------------------------------------------------connect with database.
        function openConn(){

            $serverName = "localhost";
            $userName = "root";
            $password = "";
            $dbName = "travel-agency";

            // creating connection
            $conn = new mysqli($serverName,$userName,$password,$dbName);

            // checking connection
            if($conn->connect_error){
                die("Failed to connect");
            }
            
            return $conn;

        }

        //--------------------------------------------------------Insert manager
        function insert($connObj,$username, $email, $password, $gender, $birthday, $address, $contact){
            $sql = "INSERT INTO manager 
            (username, email, password, gender, birthday, address, contact) VALUES
            ('$username', '$email', '$password', '$gender', '$birthday', '$address', '$contact') ";
            if($connObj->query($sql) == TRUE){
                echo "Successfully inserted";
            }else{
                echo "Unable to insert data";
            }
        }

        //--------------------------------------------------------Login
        function check($connObj, $email, $password){
            $sql = "SELECT * FROM manager WHERE email='$email' AND password='$password'";
            $result = mysqli_query($connObj, $sql);

            if (mysqli_num_rows($result) == 1) {
                // output data of each row
                $row = mysqli_fetch_assoc($result);
                return $row['id'];
                
            } else {
                return false;
            }
        }

        //--------------------------------------------------------Delete
        function delete($connObj, $userID){
            $sql = "DELETE FROM manager WHERE id=$userID";
            if ($connObj->query($sql) === TRUE) {
                echo true;
            } else {
                echo "Error deleting record: " . $connObj->error;
            }
        }

        //--------------------------------------------------------Update
        function getUserInfo($connObj, $userID){
            $sql = "SELECT * FROM manager WHERE id=$userID";
            $result = $connObj->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                echo json_encode($row);
            } else {
                echo "0 results";
            }
        }

        function updateManager($connObj, $id, $username, $email, $password, 
        $gender, $birthday, $address, $contact ){
            $sql = "UPDATE manager SET username = '$username', email = '$email',
            password = '$password', gender = '$gender', birthday = '$birthday',
            address = '$address', contact = '$contact' WHERE id=$id";
            $result = $connObj->query($sql);
            if ($result) {
                echo json_encode(["response"=>"success"]);
            } else {
                echo json_encode(["response"=>"failure"]);
            }
        }

        function update($connObj, $userID){
            $sql = "DELETE FROM manager WHERE id=$userID";
            if ($connObj->query($sql) === TRUE) {
                echo true;
            } else {
                echo "Error deleting record: " . $connObj->error;
            }
        }

        //--------------------------------------------------------Close connection
        function closeConn($conn){

            $conn->close();
            

        }
    
    }
?>