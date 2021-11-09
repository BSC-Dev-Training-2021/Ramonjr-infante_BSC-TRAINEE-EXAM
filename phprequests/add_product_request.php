<?php
        include("../connection/connection.php");
       $data_decoded = json_decode(file_get_contents('php://input'));
       $sql = "INSERT INTO products (product_name, product_description, product_price) VALUES 
       ('". $data_decoded->product_name_txt . "','". $data_decoded->product_description_txt ."','". $data_decoded->product_price_txt ."')";
       
        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            $sql1 = "SELECT * FROM products WHERE product_id = '" . $last_id . "'";
            $result = $conn->query($sql1);
            $data_array = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($data_array);
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
?>
