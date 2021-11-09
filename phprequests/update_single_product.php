<?php
    include("../connection/connection.php");
    $data_decoded = json_decode(file_get_contents('php://input'));
    
    $sql = "UPDATE products
        SET product_name = '". $data_decoded->edit_product_name_txt ."', product_description = '". $data_decoded->edit_product_description_txt ."', product_price = '". $data_decoded->edit_product_price_txt ."'
        WHERE product_id = '". $data_decoded->product_id ."'";
    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT * FROM products ORDER BY product_id DESC";
        $result = $conn->query($sql);
        $data_array = $result->fetch_all(MYSQLI_ASSOC);
        // echo $result->num_rows;
        echo json_encode($data_array);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>