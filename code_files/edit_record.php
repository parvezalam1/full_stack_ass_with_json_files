<?php
session_start();
if(!isset($_SESSION['useremail']))
header("location:stu_signin.php");
?>
<?php
if(array_key_exists('editid',$_REQUEST)){
$index=$_REQUEST['editid'];
$data=file_get_contents("../database_files/students_data.json");
$data_arr=json_decode($data,true);
$key=array_search($_REQUEST['editid'],array_column($data_arr,'student_id'));

$row=$data_arr[$key];
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style_files/student_form.css">
    <title>Student Form</title>
    <style>
    @media only screen and (min-width:320px) and (max-width:960px){
    .container .contentbox{
        position:absolute;
        top: 50px;
        width: 100%;
        height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .formbox{
    width: 100%;
    height: 90vh;
    background-color:rgba(0,0,0,0.5);
    display: flex;
    justify-content:flex-start;
    align-items:flex-start;

}
}
.container{
    width:100%;
    height:100vh;
}
.formbox{
    width:100%;
    height:100vh;
    
}
a{
    position:absolute;
    left:10px;
    top:3px;
    font-size:20px;
    color:blue;
}
    </style>
</head>
<body>
<div class="container">
<div class="formbox">
<a href="student_records.php">Back</a>
<form action="../database_files/save_students_data.php" method="post">
<table>
<tr><th align="center" colspan="2">Edit Student Details</th></tr>
<tr>
<tr><th align="center" colspan="2"><?php $msg;?></th></tr>
<tr>
<th>Student ID</th>
<td><input type="number" name="editid" value="<?php echo $row['student_id'];?>"></td>
</tr>
<tr>
<th>Full Name</th>
<td><input type="text" name="editname" value="<?php echo $row['full_name'];?>"></td>
</tr>
<tr>
<th>Age</th>
<td><input type="number" name="editage" value="<?php echo $row['age'];?>"></td>
</tr>
<tr>
<th>Date Of Birth</th>
<td><input type="date" name="editdob" value="<?php echo $row['DOB'];?>"></td>
</tr>
<tr>
<th>School</th>
<td>
<?php
$karmala="";
$allahabad="";
if($row['school']=="LEAD School Karmala"){
$karmala="selected";
}
?>
<select name="editschool">
<option>Select ...</option>
<option value="LEAD School Karmala" <?php echo $karmala;?>>LEAD School Karmala</option>
<select>
</td>
</tr>
<tr>
<th>Class</th>
<td>
<?php
$c1="";
$c2="";
$c3="";
$c4="";
$c5="";
if($row['class']=='1'){
    $c1="selected";
}
 else if($row['class']=='2'){
    $c2="selected";
}
else if($row['class']=='3'){
    $c2="selected";
}
else if($row['class']=='4'){
    $c4="selected";
}
else if($row['class']=='5'){
    $c5="selected";
}
?>
<select name="editclass">
<option>Select ...</option>
<option value="1" <?php echo $c1;?>>1</option>
<option value="2"  <?php echo $c2;?>>2</option>
<option value="3"  <?php echo $c3;?>>3</option>
<option value="4"  <?php echo $c4;?>>4</option>
<option value="5"  <?php echo $c5;?>>5</option>
<select>
</td>
</tr>
<tr>
<th>Division</th>
<td>
<?php
$A='';
$B='';
$C='';
$D='';
$F='';
if($row['division']=='A'){
    $A="selected";
}
 else if($row['division']=='B'){
    $B="selected";
}
else if($row['division']=='C'){
    $C="selected";
}
else if($row['division']=='D'){
    $D="selected";
}
else{
    $F="selected";
}
?>
<select name="editdivision">
<option>Select ...</option>
<option value="A" <?php echo $A;?>>A</option>
<option value="B" <?php echo $B;?>>B</option>
<option value="C" <?php echo $C;?>>C</option>
<option value="D" <?php echo $D;?>>D</option>
<option value="Fail" <?php echo $F;?>>Fail</option>
<select>
</td>
</tr>
<tr>
<th>Status</th>
<td>
<?php
$i="";
$a="";
if($row['status']=='active'){
    $a="checked";
}
else{
    $i="checked";
}
?>
<input type="radio" id="active" name="editstu" value="active" <?php echo $a;?>><label for="active"> Active</label>
<input type="radio" id="inactive" name="editstu" value="inactive" <?php echo $i;?>> <label for="inactive"> Inactive</label>
</td>
</tr>
<tr>
<td align="center" colspan="2">
<input type="hidden" name="hidbtn" value="<?php echo $row['student_id'];?>">    
<input type="submit" name="editbtn" value="Edit Data"></td>
</tr>
</table>
</form>
</div>
</div>
</div>   
</body>
</html>