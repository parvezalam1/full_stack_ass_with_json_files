<?php
if(isset($_REQUEST['btn'])){
    $file="";
    $students_file="students_data.json";
    if(is_file($students_file)){
        $file=file_get_contents($students_file);
    }
    $json_arr=json_decode($file,true);
    $key=array_search($_REQUEST['id'],array_column($json_arr,'student_id'));
    if($key>-1){
        $msg="Student Id Already Exit";
        header("location:../code_files/student_form.php?msg=$msg");
    }
    else{
        $json_arr[]=array("student_id"=>$_REQUEST['id'],"full_name"=>$_REQUEST['full_name'],"age"=>$_REQUEST['age'],"DOB"=>$_REQUEST['dob'],
        "school"=>$_REQUEST['school'],"class"=>$_REQUEST['class'],"division"=>$_REQUEST['division'],"status"=>$_REQUEST['stu']);
            if(file_put_contents($students_file,json_encode($json_arr,JSON_PRETTY_PRINT))){
                $msg="Record Save Successfully";
                header("location:../code_files/student_form.php?msg=$msg");
            }
            else{
            $msg="Record Not Save";
            header("location:../code_files/student_form.php?msg=$msg");
            }
    }
 
    }
else if(isset($_REQUEST['editbtn'])){
$index=$_REQUEST['hidbtn'];
$file="students_data.json";
$file_data=json_decode(file_get_contents($file),true);
$key=array_search($_REQUEST['hidbtn'],array_column($file_data,'student_id'));
$update_data=array(
    "student_id"=>$_REQUEST['editid'],
    "full_name"=>$_REQUEST['editname'],
    "age"=>$_REQUEST['editage'],
    "DOB"=>$_REQUEST['editdob'],
    "school"=>$_REQUEST['editschool'],
    "class"=>$_REQUEST['editclass'],
    "division"=>$_REQUEST['editdivision'],
    "status"=>$_REQUEST['editstu'],
);
$file_data[$key]=$update_data;
file_put_contents($file,json_encode($file_data,JSON_PRETTY_PRINT));
$msg="Record Update Successfully";
header("location:../code_files/student_records.php?msg=$msg");
}
?>