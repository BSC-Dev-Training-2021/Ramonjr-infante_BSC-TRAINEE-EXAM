<?php
    session_start();
    if(isset($_SESSION['user'])){
?>
<?php
    include("../template/header.php")
?>
    <div class="navbar_container">
        <div class="navbar_logo">
        <img src="../assets/images/sample_logo.png"/>
        </div>
        <div class="nav_right_panel">
                <div class="dropdown">
                <a href=""><img src="../assets/images/default.png"/></a>
                <a class="dropbtn" >
                    Ram Infante &#9660;
                </a>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="ecom.php">Shop</a>
                    <a href="logout.php">Logout</a>
                </div>
                </div>
                <a href="checkout.php"><span class="logo_cart"><i class="fas fa-shopping-cart"></i></span></a>  
        </div>
    </div>
    <div class="my_orders_container">
        <h2>My Orders</h2>
        <div class="process_type_container">
            <ul>
                <li>
                    <div class="list_container list_selected">
                        All
                    </div>
                </li>
                <li>
                    <div class="list_container">
                        To Pay(1)
                    </div>
                </li>
                <li>
                    <div class="list_container">
                        To Ship
                    </div>
                </li>
                <li>
                    <div class="list_container">
                        To Received(50)
                    </div>
                </li>
                <li>
                    <div class="list_container">
                        Delivered(102)
                    </div>
                </li>
            </ul>
        </div>
    </div> 
    <div class="sorting_orders">
        <h3>Show:</h3>
        <select>
            <option value="#">Last 5 days</option>
        </select>
    </div> 
    <div class="order_item_container">
            
    </div>
<div class="modal fade" id="edit_quantity_modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="product_name_label"> </h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Product Quantity:</label>
                <input id="edit_quantity_txt" type="number" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary"  id="update_product_qntty_btn">Update Product</button>
            <button type="button" class="btn btn-secondary" id="close_modal_edit_qntty">Close</button>
        </div>
        </div>
    </div>
    </div>
<?php
    include("../template/footer.php")
?>
<script>
    axios.get('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/get_all_orders.php').then(response => {
        console.log(response.data)

        $.each(response.data, function(index, value){
                console.log(value)
            $('.order_item_container').append('<div class="store_name order_item'+value.order_id+'"> <button class="btn btn-primary btn-sm edit_quantity" order_qty="'+value.order_qty+'" order_id="'+value.order_id+'" product_name="'+value.product_name+'">Edit Quantity</button> <button class="btn btn-danger btn-sm remove_order_btn" order_id="'+ value.order_id +'">Remove order</button> </div> </div> <div class="items_request"> <table class="table-list order_item'+value.order_id+'"> <tr> <td class="item_info_td"> <div class="item_info_td_container"> <img src="../assets/images/car_image.jfif" alt=""> <p>'+value.product_name+'</p> <span>Color: Grey, Good Condition</span> </div> </td> <td class="price_info_td"> <div class="price_info_td_container"> <p>$'+
            value.product_price +'</p> </div> </td> <td class="quantity_info_td"> <div class="quantity_info_td_container"> <p id="quantity_val'+value.order_id+'">Qty: '+value.order_qty+'</p> </div> </td> </tr> </table>')
        });

    });
    $(document).on("click",".remove_order_btn",function(){
        let order_id = $(this).attr("order_id");
        console.log(order_id)
        $('.order_item'+order_id).remove();
        toastr.success('Order Removed');
        let data = {
            order_id:order_id,
        }
        axios.post('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/delete_order.php',data).then(response => {});
    });
    $(document).on("click",".edit_quantity",function(){
        $('#edit_quantity_modal').modal("show")
        $('#product_name_label').text("Product name: " + $(this).attr("product_name"))
        $('#edit_quantity_txt').val($(this).attr("order_qty"))
        $('#update_product_qntty_btn').attr("order_id",$(this).attr("order_id"))
    })
    $(document).on("click","#close_modal_edit_qntty",function(){
        $('#edit_quantity_modal').modal("hide");
    });
    $(document).on("click","#update_product_qntty_btn",function(){
        if( $('#edit_quantity_txt').val() == ""){
            toastr.warning('Invalid product quantity');
            return;
        }
        $('#quantity_val'+$(this).attr("order_id")).text("Qty: " + $('#edit_quantity_txt').val());
        let data = {
            order_quantity:$('#edit_quantity_txt').val(),
            order_id:$(this).attr("order_id"),
        }
        console.log(data);
        axios.post('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/update_order_quantity.php',data).then(response => {});
        $('#edit_quantity_modal').modal("hide");

    });
    

</script>
<?php
    }
    else{
        header("LOCATION: http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/");
    }
?>