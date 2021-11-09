<?php
    include("../connection/connection.php");
    $data_decoded = json_decode(file_get_contents('php://input'));
		
    $sql = "SELECT * FROM products WHERE product_id ='" . $data_decoded->product_id . "'";
    $result = $conn->query($sql);
    $data_array = $result->fetch_all(MYSQLI_ASSOC);
    // echo $result->num_rows;
    echo json_encode($data_array);
?>