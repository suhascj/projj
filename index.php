<html>
<head>
<title>Inventory</title>
<style>
body{
margin:100;
background-size:100% 100%;
}
table td{
font-size:80px;color:white;
background-color:#663300;
opacity:0.8;
border-radius:20px;
width:1000px;

}



</style>
</head>
<body background="4.jpg">
<center>
<table><tr><td><i><center>Company Inventory</td></tr></table><br><br><br><br><br>
<br><br>
</center>


<div style="float:right;padding-right:10;">

<form action="login_process.php" method="post" style="padding-left:0">
<input type="text" name="email" placeholder="Username" style="height:30px;width:200px;padding:7px;border-radius:20px;border-color:#000000" required><br><br>
<input type="password" name="password" placeholder="Password" style="height:30px;border-radius:20px;width:200px;padding:7px;border-color:#000000" required><br>
<?php
session_start();
if(isset($_SESSION['warning']))
{
echo "<font color=red>".$_SESSION['warning']."</font>";
$_SESSION['warning']="";
}
?>
<br>
<input type=submit value='Login' style="height:30px;width:60px;border-radius:20px;background-color:#663300;border-color:#000000;color:white;">
</form>
</div>




</body>
</html>
