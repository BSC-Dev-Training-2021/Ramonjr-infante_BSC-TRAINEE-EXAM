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
    <div class="profile_container clearfix">
        <div class="div_profile">   
        <h1>User Profile</h1>
            <img src="../assets/images/default.png"/>
            <div class="user_information">
                <div class="user_info_holder">
                    <span><strong>Fullname:</strong> Ramon Infante</span><br/><br/>
                    <span><strong>Age:</strong> 39</span><br/><br/>
                    <span><strong>Gender:</strong> Male</span><br/><br/>
                    <span><strong>Cellphone:</strong> 09973314946</span><br/><br/>
                    <span><strong>Landline:</strong> 0412-24-2</span><br/><br/>
                    <span><strong>Address: </strong>#102 Masagana st. Sindalan City of San Fernando Pampanga</span><br/><br/>
                    <button>Edit Profile</button>
                </div>
                <div class="user_activity">
                    <span>User Activity</span><br/>
                    <span style=""><strong>Total Request:</strong> 21 items request</span><br/><br/>
                    <span><strong>Delivered:</strong> 5 items</span><br/><br/>
                    <span><strong>Pending:</strong> 2 items</span><br/><br/>
                    <span><strong>Cancelled:</strong> 10 items</span><br/><br/>
                    <span><strong>Shiped:</strong> 2 items</span><br/><br/>
                    <span><strong>Voucher:</strong> 350</span><br/><br/>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    include("../template/footer.php")
?>


<?php
    }
    else{
        header("LOCATION: http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/");
    }
?>