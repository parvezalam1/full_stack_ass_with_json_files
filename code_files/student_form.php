<?php
$msg="";
if(array_key_exists('msg',$_REQUEST)){
    $msg=$_REQUEST['msg'];
}
?>
<?php
session_start();
if(!isset($_SESSION['useremail']))
header("location:stu_signin.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style_files/student_form.css">
    <title>Student Form</title>
    <style>
        .formbox{
            position: relative;
            top:22px;
        }
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
    top:30px;
    background-color:rgba(0,0,0,0.5);
    display: flex;
    justify-content:flex-start;
    align-items:flex-start;
    
}
}
    </style>
</head>
<body>
<div class="container">
<?php 
require "logo.php";
?>
<div class="contentbox">
<?php 
require "dashboard.php";
?>
<div class="formbox">
<form action="../database_files/save_students_data.php" method="post">
<table>
<tr><th align="center" colspan="2">Add New Student Details</th></tr>
<tr>
<tr><th align="center" colspan="2"><?php echo $msg;?></th></tr>
<tr>
<th>Student ID</th>
<td><input type="number" name="id" required></td>
</tr>
<tr>
<th>Full Name</th>
<td><input type="text" name="full_name" required></td>
</tr>
<tr>
<th>Age</th>
<td><input type="number" name="age" required></td>
</tr>
<tr>
<th>Date Of Birth</th>
<td><input type="date" name="dob" required></td>
</tr>
<tr>
<th>School</th>
<td>
<select name="school" required>
<option>Select ...</option>
<option value="LEAD School Karmala">LEAD School Karmala</option>
<!-- <option value="Nursary School Allahabad">Nursary School Allhabad</option> -->
<select>
</td>
</tr>
<tr>
<th>Class</th>
<td>
<select name="class" required>
<option>Select ...</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<select>
</td>
</tr>
<tr>
<th>Division</th>
<td>
<select name="division" required>
<option>Select ...</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="Fail">Fail</option>
<select>
</td>
</tr>
<tr>
<th>Status</th>
<td>
<input type="radio" id="active" name="stu" value="active"><label for="active"> Active</label>
<input type="radio" id="inactive" name="stu" value="inactive"> <label for="inactive"> Inactive</label>
</td>
</tr>
<tr>
<td align="center" colspan="2"><input type="submit" name="btn" value="Save Data"></td>
</tr>
</table>
</form>
</div>
</div>
</div>   
</body>
</html>