<?php
    include("../connection/connection.php");
    $data_decoded = json_decode(file_get_contents('php://input'));
    $sql = "SELECT * FROM users WHERE email='". $data_decoded->email ."' AND password='". $data_decoded->password ."'";
    $result = $conn->query($sql);
    
        if($result->num_rows > 0){
            $data_array = $result->fetch_all(MYSQLI_ASSOC);
            session_start();
            $_SESSION["user"] = $data_array[0];
            echo json_encode(array(
                "status"=>"success",
                "message"=>"Tama"
            ));
        }
        else{
            echo json_encode(array(
                "status"=>"error",
                "message"=>"Email and password did't match"
            ));
        }

?>
