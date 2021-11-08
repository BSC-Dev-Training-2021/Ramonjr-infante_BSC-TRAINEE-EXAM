<?php
    include("../connection/connection.php");
		
    $sql = "SELECT * FROM products ORDER BY product_id DESC";
    $result = $conn->query($sql);
    $data_array = $result->fetch_all(MYSQLI_ASSOC);
    // echo $result->num_rows;
    echo json_encode($data_array);
?>