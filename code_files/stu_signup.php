<?php
$msg='';
if(array_key_exists('msg',$_REQUEST)){
$msg=$_REQUEST['msg'];
}

$btn="Sing Up";
$showemail="";
$showpassword="";
$showphone="";
if(array_key_exists('email2',$_REQUEST)){

    $email=$_REQUEST['email2'];
    $file="../database_files/signup.json";
    $data=json_decode(file_get_contents($file),true);
    $key=array_search($email,array_column($data,'email'));
    $showemail=$data[$key]['email'];
    $showphone=$data[$key]['phone_number'];
    $showpassword=$data[$key]['password'];
    $btn="Edit";
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up Form</title>
    <link rel="stylesheet" href="../style_files/stu_signup.css">
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.css">
  
    <style>
body{
    background:linear-gradient(45deg,#fff,#111,#eee);
}
.go_to_page{
    display:inline-block;
    position: absolute;
    top:100px;
    left:30%;
    white-space:nowrap;
    text-decoration:none;
    font-size:22px;
    color:#fff;
}
</style>
</head>
<body>

<?php
if($btn=="Edit"){
    echo '<a href="students_account.php" class="go_to_page">Go to page</a>';
}
else{
    echo '<a href="student_records.php" class="go_to_page">Go to page</a>';
}
?>
<div class="container  d-flex justify-content-center align-items-center ">

<form action="../database_files/signup_database.php" method="post">
<div class="formbox  bg-dark position-relative p-3 d-flex justify-content-center align-items-center flex-column">
<div class="form-grop">
<h6 class="text-center text-light">Create New Account</h6>
</div>
<div class="form-grop">
<h6 class="text-center text-light"><?php echo $msg;?></h6>
</div>
<div class="form-group">
<label for="" class="text-light">Insert Email ID</label>
<input type="email" required class="form-control text-center " name="email" value="<?php echo $showemail;?>"  placeholder="Insert Email ID">

</div>
<div class="form-group">
<label for="" class="text-light">Insert Phone Number</label>
<input type="number" required class="form-control text-center " name="phone_number" value="<?php echo $showphone;?>" placeholder="Insert Phone Number">

</div>
<div class="form-group">
    <label for="" class="text-light">Insert Password</label>
    <input type="password" required class="form-control text-center" name="password" value="<?php echo $showpassword;?>" placeholder="Insert Password">
   
    </div>
   
    <div class="form-group">
    <input type="submit" class="form-control w-50 " name="btn" style="margin:6px 50px;font-weight:bold;" value="<?php echo $btn;?>">
    <input type="hidden" name="hidden" value="<?php echo $showemail;?>">
  
</div>
<div class="form-group">
    <div class="go_to_signin"><a href="stu_signin.php">Sign In</a></div>
    </div>
</form>
</div>   
</body>
</html>