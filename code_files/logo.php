<html lang="en">
<!-- <?php
session_start();
if(!isset($_SESSION['useremail']))
header("location:stu_signin.php");
?> -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style_files/logo.css">
    <title>logo file</title>
    <style>
    *{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
.logo{
    position: relative;
    width: 100%;
    height: 50px;
    padding: 25px;
    background-color: goldenrod;
    display: flex;
    justify-content:space-between;
    align-items: center;

}
.logo .icon{
    font-size: 22px;
    color: black;
}
.lead a{
    display: inline-block;
    width: 90px;
    height: 35px;
    text-align: center;
    line-height: 35px;
    text-decoration: none;
    color: black;
    background-color: beige;
}
.logo .pname{
    width: 150px;
    height: 35px;
    display: flex;
    justify-content:space-around;
    align-items: center;

}
.logout{
    position:relative;
    width:100%;
    height:5%;
    background-color:rgba(0,0,0,0.3);
    display:flex;
    justify-content:flex-end;
    align-items:center;
}
.logout a{
    display:inline-block;
    width:90px;
    height:30px;
    margin:2px 50px 0px 0px;
    text-decoration:none;
    font-size:20px;
    font-weight:bold;
    background:rgba(0,0,0,0.5);
    color:#fff;
    text-align:center;
    line-height:30px;
    
}

@media only screen and (min-width:320px) and (max-width:960px){
    .logout a{
        position: relative;
        left:0%;
    display:inline-block;
    width:60px;
    height:25px;
    text-decoration:none;
    font-size:16px;
    font-weight:bold;
    /* background:rgba(0,0,0,0.5); */
    color:#fff;
    text-align:center;
    line-height:25px;
}
.logo .icon{
    font-size: 18px;
    color: black;
}
.lead a{
    display: inline-block;
    position:absolute;
    left:3px;
    top:13px;
    width: 65px;
    font-size:12px;
    height: 25px;
    text-align: center;
    line-height: 25px;
    text-decoration: none;
    color: black;
    background-color: beige;
}
.logo .pname{
    position:absolute;
    right:3%;
    top:13px;
    padding:2px;
    width: 130px;
    height: 25px;
    display: flex;
    justify-content:space-around;
    align-items: center;
}
}
    </style>
</head>
<body>
<div class="logout">

<a href="../database_files/login_system.php?logout=1">Logout</a>
</div> 
<div class="logo">
<div class="lead">
<a href="#">LEAD Logs</a>
</div>
<div class="pname">
<a href="#"><ion-icon class="icon" name="notifications-circle-outline"></ion-icon></a>
<a href="#"><ion-icon class="icon" name="person-circle-outline"></ion-icon></a><b style="white-space:nowrap;">person name</b>
</div>
</div>  
</body>
</html>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>