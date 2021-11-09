<?php
    include("../connection/connection.php");
    $data_decoded = json_decode(file_get_contents('php://input'));
    
    $sql = "UPDATE orders
        SET order_qty = '". $data_decoded->order_quantity ."'
        WHERE order_id = '". $data_decoded->order_id ."'";
        if (mysqli_query($conn, $sql)) {
            echo "Affected rows: " . $conn->affected_rows;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

?>