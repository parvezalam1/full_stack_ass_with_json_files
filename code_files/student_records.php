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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/boostrap/4.0.0/css/bootstrap.min.css">

<script src="table2excel.js"></script>
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
        body{
            overflow-x:hidden;
        }
    @media only screen and (min-width:320px) and (max-width:960px){
    .container .contentbox{
        position:absolute;
        top: 20%;
        width: 100%;
        min-height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        
    }
    .box{
        position:relative;
        top:5%;
    width: 100%;
    min-height: 100vh;
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
.pagination{
    position: relative;
    top:0%;

    width:100%;
    height:30px;
    /* display:flex; */
    /* justify-content:center; */
/* z-index: 100; */
}
.pagination ul{
    position: absolute;
   
    display:flex;
    flex-direction:row;
    z-index: 100;
}
.pagination ul li a{
    display:inline-block;
    width:30px;
    height:25px;
    background:red;
    color:white;
    line-height:25px;
    margin:0px;
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

.pagination{
    position: relative;
    top:20%;
    left:35%;
}
.pagination ul{
    position: absolute;
    left:0px;
    display:flex;
    flex-direction:row;
    z-index: 100;
}
.pagination ul li a{
    display:inline-block;
    width:30px;
    height:25px;
    background:red;
    color:white;
    line-height:25px;
    margin:2px;
}
.pagination .next{
    width:45px;
    background:green;
}
.pagination .prev{
    width:45px;
    background:green;
}
.pagination .active{
    background:lime;
    color:black;
}
.covert_file{
    position: relative;
    top:40%;
    left:40%;
}
button{
    width:120px;
    height:30px;
    background:black;
    color:#fff;
    border-radius:30px;
    font-weight:700px;
    font-style:italic;
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
<input type="search" placeholder="search item from name" id="searchitem" onkeyup="search()">
</form>
</div>
<table class="export_table" id="table">
<tr><th colspan="9" align="center" style="border:none;"><?php echo $msg;?></th></tr>
<tr>
<th>Student ID</th>
<th>Name</th>
<th>Age</th>
<th>DOB</th>
<th>School</th>
<th>Class</th>
<th>Division</th>
<th>Status</th>
<th>Action</th>
</tr>
<div id="product_list">
<tbody id="tbody">
<?php

$limit=5;

if(isset($_REQUEST['page'])){
    $page=$_REQUEST['page'];
}else{
    $page=1;
}
$offset=($page -1)*$limit;
$json_data=file_get_contents('../database_files/students_data.json');
$all_json_data=json_decode($json_data,true);
if(count($all_json_data)!=0){
    $array_slice=array_slice($all_json_data,$offset,$limit);
    foreach($array_slice as $product){
        $index=$product['student_id'];
        ?>

<tr id="tr">
<td><?php echo $product['student_id'];?></td>
<h3><td data-name><?php echo $product['full_name'];?></td></h3>
<td><?php echo $product['age'];?></td>
<td><?php echo $product['DOB'];?></td>
<td><?php echo $product['school'];?></td>
<td><?php echo $product['class'];?></td>
<td><?php echo $product['division'];?></td>
<td><?php echo $product['status'];?></td>
<td>
<a  href='#'
onClick="confirmDelete(<?php echo $product['student_id'];?>,'<?php echo $product['full_name'];?>')" class="delbtn actionbtn">Delete</a>
<a  href='edit_record.php?editid=<?php echo $product["student_id"];?>' class="editbtn actionbtn">Edit</a>
</td>
</tr>
  

    
        <?php
    
    }
}
?>
  </tbody>  
</div>
</table>
<div class="pagination">
<ul>
<?php
$file="../database_files/students_data.json";
$data=json_decode(file_get_contents($file),true);
$size=count($data);

 $total_record=ceil($size/5);
 if($page>1){
    echo '<li><a href="student_records.php?page='.($page - 1).'" class="prev">Prev</a></li>';
}
for($i=1;$i<=$total_record;$i++){
   if($i==$page){
    $active="active";
   }
   else{
    $active="";
   }
    echo "<li><a class='$active'  href='student_records.php?page={$i}'>".$i."</a></li>";
}
if($page!=$total_record){
    echo '<li ><a href="student_records.php?page='.($page + 1).'" class="next">Next</a></li>';
}

?>

</ul>
</div>
<div class="covert_file">
<button onClick="convert_excel()">Table To Excel</button>
</div>

</div>
</div>  

<form name="frmDel" action="../database_files/delete_record.php">
<input type="hidden" name="actDel">
</form>
<div  id="actionbtn">
</div> 
</body>
</html>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

<script>
function confirmDelete(id,stdName)
{
	if(confirm("Are You Sure to Delete the Record : "+stdName))
	{
		document.frmDel.actDel.value=id;
		document.frmDel.submit();
	}
}

</script>

<script>


const convert_excel=()=>{
    var table2excel = new Table2Excel();
  table2excel.export(document.querySelectorAll("table"));
}


const search=()=>{

let search=document.getElementById("searchitem").value.toUpperCase();

var table=document.getElementById("tbody");
for(var i=0;i<table.rows.length;i++){
 for(var j=0;j<table.rows[i].cells.length;j++){
    let textValue=table.rows[i].cells[1].innerHTML;
    if(textValue.toUpperCase().indexOf(search)>-1){
        table.rows[i].style.display="";
    }else{
        table.rows[i].style.display="none";
    }
 }
}
// console.log(productList,product,searchItem)
// let pname=productList.getElementsByTagName("p");
// console.log(pname)
// for(var i=0;i<pname.length;i++){
//     let match=product[i].getElementsByTagName("p")[2];
//     if(match){
//         let textValue=match.textContent || match.innerHTML;
//         if(textValue.toUpperCase().indexOf(searchItem)>-1){
//             product[i].style.display="";
//         }else{
//             product[i].style.display="none";
//         }
//     }
// }
}
</script>




