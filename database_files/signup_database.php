<?php
// include "connection.php";
// $email=$_REQUEST['email'];
// $phone_number=$_REQUEST['phone_number'];
// $password=$_REQUEST['password'];
// if(array_key_exists('btn',$_REQUEST)){
// $sql=$conn->prepare("insert into signup (email,phone_number,password) values (:email,:phone,:password)");

// if($sql->execute(array(':email'=>$email,':phone'=>$phone_number,':password'=>$password))){
//     $msg="Data Inserted";
//     header("location:../code_files/stu_signup.php?msg=$msg");
// }else{
//     $msg="Query Failed";
//     header("location:../code_files/stu_signup.php?msg=$msg");
// }
// }

if($_REQUEST['btn']=="Sing Up"){

$data="";
$signup="signup.json";
if(is_file($signup)){
    $data=file_get_contents($signup);
}
$json_arr=json_decode($data,true);
print_r($json_arr);

if($json_arr==true){
    $email=array_search($_REQUEST['email'],array_column($json_arr,'email'));
    $phone=array_search($_REQUEST['phone_number'],array_column($json_arr,'phone_number'));
    $password=array_search($_REQUEST['password'],array_column($json_arr,'password'));
    if($email>=0 || $phone>=0 || $password>=0 || $key!='undefined'){
        if($json_arr[$email]['email']==$_REQUEST['email']){
            $msg="email already exit";
            header("location:../code_files/stu_signup.php?msg=$msg");
            }
           
            else if($json_arr[$phone]['phone_number']==$_REQUEST['phone_number'])
            {
                $msg="phone number already exit";
            header("location:../code_files/stu_signup.php?msg=$msg");
            }
            
                else if($json_arr[$password]['password']==$_REQUEST['password']){
                    $msg="password already exit";
                    header("location:../code_files/stu_signup.php?msg=$msg");
                }
                else{
                    $json_arr[]=array("email"=>$_REQUEST['email'],"phone_number"=>$_REQUEST['phone_number'],"password"=>$_REQUEST['password']);
                    if(file_put_contents($signup,json_encode($json_arr,JSON_PRETTY_PRINT))){
                        $msg="Account Created Successfully";
                        header("location:../code_files/stu_signup.php?msg=$msg");
                    }
                    else{
                    $msg="Query Failed";
                    header("location:../code_files/stu_signup.php?msg=$msg");
                    }
                }
    }
    
}

else{
    $json_arr[]=array("email"=>$_REQUEST['email'],"phone_number"=>$_REQUEST['phone_number'],"password"=>$_REQUEST['password']);
    if(file_put_contents($signup,json_encode($json_arr,JSON_PRETTY_PRINT))){
        $msg="Account Created Successfully";
        header("location:../code_files/stu_signup.php?msg=$msg");
    }
    else{
    $msg="Query Failed";
    header("location:../code_files/stu_signup.php?msg=$msg");
    }
}






}

//edit account code
else if($_REQUEST['btn']=="Edit"){
    
    $editData=array(
        "email"=>$_REQUEST['email'],
        "phone_number"=>$_REQUEST['phone_number'],
        "password"=>$_REQUEST['password']
);
    $file="signup.json";
    $data_file=json_decode(file_get_contents($file),true);
    $index=array_search($_REQUEST['hidden'],array_column($data_file,'email'));
    $data_file[$index]=$editData;
    file_put_contents($file,json_encode($data_file,JSON_PRETTY_PRINT));
    $msg="account updated";
    header("location:../code_files/students_account.php?msg=$msg");
}

?>