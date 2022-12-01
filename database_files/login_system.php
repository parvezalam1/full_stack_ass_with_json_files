<?php
session_start();
if($_REQUEST['logout']){
    session_destroy();
}
$email_phone=$_REQUEST['email_phone'];
$password=$_REQUEST['password'];
$file="signup.json";
$file_data=json_decode(file_get_contents($file),true);
// print_r($file_data);
$index=array_search($_REQUEST['email_phone'],array_column($file_data,'email'));

if($file_data[$index]['email'] == $_REQUEST['email_phone'] || $file_data[$index]['phone_number'] == $_REQUEST['email_phone'] ){
   if($file_data[$index]['password'] == $_REQUEST['password']){
    $_SESSION['useremail']="123";
    header("location:../code_files/student_records.php?");
   }else{
        $msg="password incorrect";
        header("location:../code_files/stu_signin.php?msg=$msg");
   }
}
else{
     $msg="email or phone incorrect";
     header("location:../code_files/stu_signin.php?msg=$msg");
}
?>

