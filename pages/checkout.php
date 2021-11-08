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
            <div class="store_name">
            Philippines Car Store
            </div>
            <div class="type_name">
                Pending
            </div>
        </div>  
        <div class="items_request">
            <table class="table-list">
                <tr>
                    <td class='item_info_td'>
                        <div class="item_info_td_container">
                            <img src="../assets/images/car_image.jfif" alt="">
                            <p>Second hand Jeepney</p>
                            <span>Color: Grey, Good Condition</span>
                        </div>
                    </td>
                    <td class='price_info_td'>
                        <div class="price_info_td_container">
                            <p>$5000</p>
                        </div>
                    </td>
                    <td class='quantity_info_td'>
                        <div class="quantity_info_td_container">
                            <p>Qty: 1</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
</body>
</html>
<?php
    include("../template/footer.php")
?>
<script>
    axios.get('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/get_all_orders.php').then(response => {
        console.log(response.data)
    });
</script>
<?php
    }
    else{
        header("LOCATION: http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/");
    }
?>