<html lang="en">
 <?php
if(!isset($_SESSION['useremail']))
header("location:stu_signin.php");
?> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style_files/dashboard.css">
    <link rel="stylesheet" href="../media/dashboard.css">

    <title>dashboard</title>
<style>
.dashboard{
    position: relative;
    top:22px;
    width: 20%;
    height:95%;
    display: flex;
    padding: 5px;
    justify-content:flex-start;
    align-items:center;
    flex-direction: column;
    background-color:rgba(0,0,0,0.3);
}
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

ul{
    width: 100%;
}
ul li{
    list-style: none;
   
    height: 30px;
    text-align: center;
    line-height: 30px;
    margin-top: 1px;
  
}
ul li a{
    display: inline-block;
    text-decoration: none;
    color: black;
 width: 100%;
    font-size: 20px;
    font-weight: 800px;

}
ul li .active{
    background-color:gray;
}

@media only screen and (min-width:320px) and (max-width:960px){
  
  .dashboard{
    top:31px;
      width: 100%;
      height: 20%;
      display: flex;
      padding: 5px;
      justify-content:flex-start;
      align-items:center;
      flex-direction: column;
  }
  ul{
      width: 100%;
  }
  ul li{
      list-style: none;
     
      height: 30px;
      text-align: center;
      line-height: 30px;
      margin-top: 1px;
    
  }
  ul li a{
      display: inline-block;
      text-decoration: none;
      color: black;
   width: 100%;
      font-size: 20px;
      font-weight: 800px;
  
  }
  ul li .active{
      background-color:gray;
  }
  
}
</style>
</head>
<body>
<div class="dashboard">
<h3>Students</h3>

<ul>
<li><a href="student_records.php" class="active2">View Students Record</a></li>
<li><a href="students_account.php" class="active2">View Students Account</a></li>
<li><a href="student_form.php">+ Add New Student</a></li>
</ul>
</div> 
</body>
</html>
<script>
let allList=document.querySelectorAll('ul li a');
function listenEvent(e){
    allList.forEach(function(li){
        li.classList.remove('active');
      
    })
this.classList.add("active")
}
allList.forEach(function(li){
    li.addEventListener("click",listenEvent);
})

</script>