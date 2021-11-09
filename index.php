<?php
    session_start();
    if(!isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html>
<head>
<title>Exam Ecommerce</title>
  <link rel="stylesheet" href="assets/css/customize_style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/toastr.css">
</head>
<body>
    <div class="navbar_container">
        <div class="navbar_logo">
            <img src="assets/images/sample_logo.png"/>
        </div>
        <div class="nav_right_panel">
            <button class="btn btn-default btn-md mr-10"> Sign-Up</button>
            <button class="btn btn-primary btn-md mr-10"> Sign-In</button>
        </div>
    </div>
    <div class="login_container">
        <div class="login_form_container">
            <h2>User Account</h2>
            <input id="emailtxt" type="email" class="input-field" placeholder="Email" /><br/><br/><br/>
            <input id="passwordtxt" type="password" class="input-field mt-10" placeholder="Password" /><br/><br/><br/>
            <a id="login_btn"><button class="btn btn-primary btn-md mr-10" >Sign-In</button></a>
            <a href="#"><p>Forgot Password?</p></a>
        </div>
    </div>
</body>
</html>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/axios.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/toastr.js"></script>
<script>
    $( document ).ready(()=> {
        $(document).on("click","#login_btn",()=>{
            if($('#emailtxt').val() == ""){
                toastr.warning('Email is empty');
                return;
            }
            if($('#passwordtxt').val() == ""){
                toastr.warning('Password is empty');
                return;
            }
			let data = {
				email:$('#emailtxt').val(),
				password:$('#passwordtxt').val(),
			}
			axios.post('http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/phprequests/login_request.php',data).then(response => {
				console.log(response.data)
                if(response.data.status == "success"){
                    toastr.success(response.data.message);
                   
                    window.location.href = "http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/pages/ecom.php"
                }
                else{
                    toastr.error(response.data.message);
                }
        	});
        });
    })
</script>
<?php
    }
    else{
        header("LOCATION: http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM/pages/ecom.php");
    }
?>