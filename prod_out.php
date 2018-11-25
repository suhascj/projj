<html>
<head>
<title>Inventory</title>
<style>
body{
margin:100;
background-size:100% 100%;
}
table td{
color:black;'

}
table tr{
font-size:20px;
}






</style>
</head>
<body background="images/2.jpg">
<center>
<form action="rmv_prod.php" method="post"><b><font color="black" size="20px">
Product Out<br></b>
<div style="width:380px;height:300px;border-radius:20px;border:2px solid #000000;">
<table>
</font><font color="white" size="4px"><br>
<tr><td><b>PID:</td><td><input type="number" name="pid" placeholder="Enter Product ID" style="border-color:black;border-radius:20px;height:40px;padding-left:20px"></td></tr>
<tr><td><b>Date:</td><td><br><input type="date" name="date_out" placeholder="Enter Employee name" style="border-color:black;border-radius:20px;height:40px;padding-left:20px"></td></tr>
<tr><td><b>Quantity:</td><td><br><input type="text" name="qty" placeholder="Enter quantity" style="border-color:black;border-radius:20px;height:40px;padding-left:20px"></td></tr>
<tr><td><b>WID:</td><td><br><input type="number" name="wid" placeholder="Enter Warehouse ID" style="border-color:black;border-radius:20px;height:40px;padding-left:20px"></td></tr>

</table></div><br>
<?php
session_start();
if(isset($_SESSION['tri']))
{
echo "<font color=red>".$_SESSION['tri']."</font>";
$_SESSION['tri']="";
}
?><br>
<input type="submit" value="Submit" style="width:80px;height:35px;border-radius:20px;background-color:#663300;opacity:0.7;border-color:black;color:white">
</form>



</center>

</body>
</html>
















