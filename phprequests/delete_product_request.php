<?php
    include("../connection/connection.php");
    $data_decoded = json_decode(file_get_contents('php://input'));
    
    $sql = "DELETE FROM products WHERE product_id = '" . $data_decoded->product_id . "'";
    if (mysqli_query($conn, $sql)) {
        $sql1 = "DELETE FROM orders WHERE product_id = '" . $data_decoded->product_id . "'";
        if (mysqli_query($conn, $sql1)) {
            $sql = "SELECT * FROM products ORDER BY product_id DESC";
            $result = $conn->query($sql);
            $data_array = $result->fetch_all(MYSQLI_ASSOC);
            // echo $result->num_rows;
            echo json_encode($data_array);
        }
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>