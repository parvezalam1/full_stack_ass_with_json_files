<html lang="en">
<?php
$msg='';
if(array_key_exists('msg',$_REQUEST)){
    $msg=$_REQUEST['msg'];
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up Form</title>
    <link rel="stylesheet" href="../style_files/stu_signup.css">
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.css">
  
<style>
body{
    background:linear-gradient(45deg,#0983,#111,#094);
}
</style>
</head>
<body>




<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
<div class="col">
    <a href="student_form.php" style="position:relative;top:-110px; text-decoration:none;font-size:20px;color:#fff;">Go to page</a>
    <form action="../database_files/login_system.php" method="post">
<div class="formbox w-100  bg-dark position-relative p-3">
<div class="form-grop">
<h6 class="text-center text-light">Login Your Account</h6>
</div>
<div class="form-grop">
<h6 class="text-center text-light"><?php echo $msg;?></h6>
</div>
<div class="form-group">
<label for="" class="text-light">Email ID OR Phone Number</label>
<input type="text" name="email_phone" required class="form-control text-center" placeholder="Enter Email OR Phone Number">

</div>
<div class="form-group">
    <label for="" class="text-light">Password</label>
    <input type="password" name="password" required class="form-control text-center" placeholder="Enter Your Password">
   
    </div>
    <div class="form-group">
    <input type="submit" class="form-control w-50 " name="signinbtn" style="margin:6px 60px;font-weight:bold;" value="Login">
   
    </div>
    <span><a href="#">Forgot Password / </a><a href="stu_signup.php">Register New Account</a></span>
    </div>
</div>
</form>
</div>

</div>
</div>   
</body>
</html>
