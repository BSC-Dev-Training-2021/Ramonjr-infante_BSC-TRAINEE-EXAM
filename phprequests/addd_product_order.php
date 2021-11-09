<?php
        session_start();
        include("../connection/connection.php");
        $data_decoded = json_decode(file_get_contents('php://input'));
        $sql = "INSERT INTO orders (order_qty, product_id, user_id) VALUES 
        ('1','". $data_decoded->product_id ."','". $_SESSION['user']['id'] ."')";
        
        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
?>
