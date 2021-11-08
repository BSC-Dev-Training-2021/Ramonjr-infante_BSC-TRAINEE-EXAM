<?php
    include("../connection/connection.php");
    $data_decoded = json_decode(file_get_contents('php://input'));
    
    $sql = "DELETE FROM products WHERE product_id = '" . $data_decoded->product_id . "'";
    if (mysqli_query($conn, $sql)) {
        echo "Affected rows: " . $conn->affected_rows;
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>