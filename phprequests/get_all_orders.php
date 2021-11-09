<?php
    session_start();
    include("../connection/connection.php");
		
    $sql = "SELECT * FROM orders 
    INNER JOIN products ON products.product_id=orders.product_id WHERE user_id = '". $_SESSION['user']['id'] ."'
    ORDER BY order_id DESC";
    $result = $conn->query($sql);
    $data_array = $result->fetch_all(MYSQLI_ASSOC);
    // echo $result->num_rows;
    echo json_encode($data_array);
?>