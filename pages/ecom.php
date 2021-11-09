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
                <a class="dropbtn" style="">
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
    <div class="category_container">
            <ul>
                <li>
                    <div class="category_text">
                        Foods
                    </div>
                </li>
                <li>
                    <div class="category_text">
                        Short
                    </div>
                </li>
                <li>
                    <div class="category_text">
                        Pants
                    </div>
                </li>
                <li>
                    <div class="category_text">
                        T-shirt
                    </div>
                </li>
                <li>
                    <div class="category_text category_active">
                        Car
                    </div>
                </li>
                <li>
                    <div class="category_text">
                        Vape
                    </div>
                </li>
                <li>
                    <div class="category_text">
                        Shoes
                    </div>
                </li>   
                <li>
                    <div class="category_text">
                        Bag
                    </div>
                </li>
        </ul>
        <button class="btn btn-primary btn-md" id="product_modal">Add product</button>
    </div>
    <div class="items_container">
        <ul  id="product_list">
        </ul>
    </div>
    <div class="item_pagination">
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a class="active" href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>
    </div>
    <div class="modal fade" id="product_modal_mdl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Product Info</h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product name:</label>
                <input id="product_name_txt" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product description:</label>
                <input id="product_description_txt" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product price:</label>
                <input id="product_price_txt" type="number" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary"  id="add_product_btn">Save Product</button>
            <button type="button" class="btn btn-secondary" id="close_modal_add_product">Close</button>
        </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="product_edit_modal_mdl">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Product Info</h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product name:</label>
                <input id="edit_product_name_txt" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product description:</label>
                <input id="edit_product_description_txt" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product price:</label>
                <input id="edit_product_price_txt" type="number" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary"  id="update_product_btn">Update Product</button>
            <button type="button" class="btn btn-secondary" id="close_modal_edit_product">Close</button>
        </div>
        </div>
    </div>
    </div>
<?php
    include("../template/footer.php")
?>


<script>
    $( document ).ready(function() {
        function print_data(value,status){
            console.log(value)
            if(status == "append"){
                $('#product_list').append('<li> <div class="item_container clearfix"> <div class="item_image"><button class="btn btn-danger btn-sm delete_product" product_id="'+ value.product_id + '">Delete</button> <img src="../assets/images/car_image.jfif" style="width:100%;border-radius:30px;"/> </div> <div class="item_info"> <div class="item_info_holder"> <span>Name</span><br/> <span>'+ value.product_name + '</span> </div><br/> <div class="item_info_holder"> <span>Description</span><br/> <span>'+ value.product_description + '</span> </div><br/> <div class="item_info_holder"> <span>Price</span><br/> <span>$'+ value.product_price + '</span> </div> </div> </div> <div class="item_option"> <button product_id="' + value.product_id +'" class="select_product_btn"><span style="padding-right:10px;" ><i class="fas fa-shopping-cart"></i></span>Add to Cart</button> <button class="btn btn-warning form-control edit_product_btn" product_id="'+value.product_id+'">Edit</button> </div> </li>')
           }
           else{
                $('#product_list').prepend('<li> <div class="item_container clearfix"> <div class="item_image"><button class="btn btn-danger btn-sm delete_product" product_id="'+ value.product_id + '">Delete</button> <img src="../assets/images/car_image.jfif" style="width:100%;border-radius:30px;"/> </div> <div class="item_info"> <div class="item_info_holder"> <span>Name</span><br/> <span>'+ value.product_name + '</span> </div><br/> <div class="item_info_holder"> <span>Description</span><br/> <span>'+ value.product_description + '</span> </div><br/> <div class="item_info_holder"> <span>Price</span><br/> <span>$'+ value.product_price + '</span> </div> </div> </div> <div class="item_option"> <button product_id="' + value.product_id +'" class="select_product_btn"><span style="padding-right:10px;" ><i class="fas fa-shopping-cart"></i></span>Add to Cart</button> <button class="btn btn-warning form-control edit_product_btn" product_id="'+value.product_id+'">Edit</button> </div> </li>')
           }
        };
        axios.get('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/select_all_products.php').then(response => {
            console.log(response.data)
            $.each(response.data, function(index, value){
                print_data(value,"append");
            });
        });

        $(document).on("click",'#product_modal',function(){
            $('#product_modal_mdl').modal("show");
            $('#product_name_txt').val("")
             $('#product_description_txt').val("")
            $('#product_price_txt').val("")
        })
        $(document).on("click",'#close_modal_add_product',function(){
            $('#product_modal_mdl').modal("hide")
        });
        $(document).on("click",'#add_product_btn',function(){
            if($('#product_name_txt').val() == ""){
                toastr.warning('Product name is empty');
                return;
            }
            
            if($('#product_description_txt').val() == ""){
                toastr.warning('Product description is empty');
                return;
            }
            
            if($('#product_price_txt').val() == ""){
                toastr.warning('product price is empty');
                return;
            }
            
			let data = {
                product_name_txt:$('#product_name_txt').val(),
                product_description_txt:$('#product_description_txt').val(),
                product_price_txt:$('#product_price_txt').val(),
			}
			axios.post('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/add_product_request.php',data).then(response => {
				
                print_data(response.data[0],"prepend");
                toastr.success('Product added');
                $('#product_modal_mdl').modal("hide")
        	});
        });
        $(document).on("click",".select_product_btn",function(){
            let data = {
                product_id:$(this).attr("product_id")
            }
            axios.post('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/addd_product_order.php',data).then(response => {
                console.log(response.data)
                toastr.success('Product added to Shopping cart');
            });
        })
        $(document).on("click",".delete_product",function(){
            let data = {
                product_id:$(this).attr("product_id")
            }
            console.log(data)
            axios.post('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/delete_product_request.php',data).then(response => {
                console.log(response.data)
                toastr.success('Product Deleted');
                $('#product_list').html("");
                $.each(response.data, function(index, value){
                    print_data(value,"append");
                });
            });
        });
        $(document).on("click",".edit_product_btn",function(){
            let data = {
                product_id:$(this).attr("product_id")
            }
            axios.post('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/get_single_product.php',data).then(response => {
                console.log(response.data)
                $('#product_edit_modal_mdl').modal("show");
                $('#update_product_btn').attr("product_id",response.data[0].product_id)
                $('#edit_product_name_txt').val(response.data[0].product_name)
                $('#edit_product_description_txt').val(response.data[0].product_description)
                $('#edit_product_price_txt').val(response.data[0].product_price)
            });
        });
        $(document).on("click","#close_modal_edit_product",function(){
            $('#product_edit_modal_mdl').modal("hide");
        })
        $(document).on("click","#update_product_btn",function(){
            if($('#edit_product_name_txt').val() == ""){
                toastr.warning('Product name is empty');
                return;
            }
            if($('#edit_product_description_txt').val() == ""){
                toastr.warning('Product description is empty');
                return;
            }
            if($('#edit_product_price_txt').val() == ""){
                toastr.warning('Product price is empty');
                return;
            }
            let data = {
                product_id:$(this).attr("product_id"),
                edit_product_name_txt:$('#edit_product_name_txt').val(),
                edit_product_description_txt:$('#edit_product_description_txt').val(),
                edit_product_price_txt:$('#edit_product_price_txt').val(),
            }
            console.log(data)
            axios.post('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/update_single_product.php',data).then(response => {
                console.log(response.data)
                toastr.success('Product Updated');
                $('#product_list').html("");
                $.each(response.data, function(index, value){
                    print_data(value,"append");
                });
                $('#product_edit_modal_mdl').modal('hide')
            });
        })
    });
</script>

<?php
    }
    else{
        header("LOCATION: http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/");
    }
?>