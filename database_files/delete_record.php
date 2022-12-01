<?php
if(array_key_exists('actDel',$_REQUEST)){
$file="students_data.json";
$file_data=json_decode(file_get_contents($file),true);
$key=array_search($_REQUEST['actDel'],array_column($file_data,'student_id'));
unset($file_data[$key]);
file_put_contents($file,json_encode($file_data,JSON_PRETTY_PRINT));

header("location:../code_files/student_records.php?");
}
else if(array_key_exists('accountDel',$_REQUEST)){
    $file="signup.json";
    $json_decode=json_decode(file_get_contents($file),true);
    $key=array_search($_REQUEST['accountDel'],array_column($json_decode,'email'));
    unset($json_decode[$key]);
    file_put_contents($file,json_encode($json_decode,JSON_PRETTY_PRINT));
    header("location:../code_files/students_account.php?");
}
?>