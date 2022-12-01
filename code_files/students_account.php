<html lang="en">
<?php
session_start();
if(!isset($_SESSION['useremail']))
header("location:stu_signin.php");
?>
    <?php
$msg="";
if(array_key_exists('msg',$_REQUEST)){
    $msg=$_REQUEST['msg'];
}
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style_files/students_records.css">
    <title>All Students Records</title>
    <style>
        .box{
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
    .box{
        position: relative;
        top:30px;
    width: 100%;
    height: 90vh;
    overflow:auto;
    background-color:rgba(0,0,0,0.5);
}
.box .searchitem{
position: relative;
left:10%;
top: 10px;
width: 290px;
height: 30px;
display: flex;
justify-content: center;
align-items: center;
flex-direction: row;

}
.box .searchitem input{
    position: absolute;
    top: 0px;
    left: 0px;
    width: 220px;
    height: 30px;
    font-weight: bold;
    font-size: 16px;
    text-align: center;
    box-shadow: 0px 0px 3px #fff,0px 0px 6px red;
}
.box .searchitem button{
    position: absolute;
    right: 0px;
    top: 0px;
    width: 60px;
    height: 30px;
    background: linear-gradient(90deg,#091,#112,#786);
    color: #fff;
    font-size: 14px;
    font-weight: bold;
border-radius: 10px;
letter-spacing: 0.5px;
}
.box table{
    position: relative;
    top: 50px;
    left: 2px;
    padding:3px;
    width: 600px;
    border: 1px solid black;

}
}
.actionbtn{
    width:30px;
    height:25px;
    text-decoration:none;
    margin-left: 5px;
    padding:5px;
    font-weight:bold;
    letter-spacing:0.8px;
}
.delbtn{
    background:red;
    color:#fff;
}
.editbtn{
    background:green;
    color:#fff;
}
table th,td{
    padding:6px;
    border:0.5px solid black;
    white-space:nowrap;
    color:#fff;
    text-shadow:0px 0px 1px red;
}
.hide{
    display:none;
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
<div class="box" data-box>
<div class="searchitem">
<form>
<!-- <input type="search" placeholder="search item from name" id="searchItem" data-search> -->
<!-- <button>Search</button> -->
</form>
</div>
<table>
<tr><th colspan="9" align="center" style="border:none;"><?php echo $msg;?></th></tr>
<tr>
<th>Email</th>
<th>Phone Number</th>
<th>Password</th>
<th>Action</th>
</tr>
<?php
$file="../database_files/signup.json";
$json_decode=json_decode(file_get_contents($file),true);
if(count($json_decode)!=0){
foreach($json_decode as $row){
    echo "<tr><td align='center'>".$row['email']."</td><td align='center'>".$row['phone_number']."</td><td align='center'>".$row['password']."</td>
    <td align='center'><a class='delbtn actionbtn' href='#' onClick=confirmDelete('$row[email]')>Delete</a>&nbsp;<a class='editbtn actionbtn' href='stu_signup.php ?email2=$row[email]'>Edit</a></td></tr>";
}
}else{
    $msg="No any account";
}
?>
<!-- <?php
$json_data=file_get_contents('../database_files/signup.json');
$all_json_data=json_decode($json_data,true);
if(count($all_json_data)!=0){
    foreach($all_json_data as $product){
        $index=$product['student_id'];
        ?>
<div class="temp" data-template>
<tbody id="tbody" class="" data-tbody>

    </tbody>
    </div>
    
        <?php
    
    }
}
?> -->
</table>

</div>
</div>  

<form name="frmDel" action="../database_files/delete_record.php">
<input type="hidden" name="accountDel">
</form>

</body>
</html>
<script>
function confirmDelete(email)
{
	if(confirm("Are You Sure to Delete this Record : "+email))
	{
		document.frmDel.accountDel.value=email;
		document.frmDel.submit();
	}
}
</script>





<script>


</script>
