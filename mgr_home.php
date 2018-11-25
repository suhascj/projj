<html>
<head>
<title>Inventory</title>
<style>
body{
margin:100;
background-size:100% 100%;
}




</style>
</head>
<body background="images/4.jpg">

<a href="index.php" style="float:right"><input type=button value=Logout style="height:30px;width:80px;border-radius:20px;background:#663300;opacity:0.7;border-color:#ffffff;color:white"></a><br><br><br>



<div style="float:left">
<br><br><br><br><br><br><br>
<a href="mgrproducts.php"><input type=button value='Products' style="height:100px;width:200px;border-radius:20px;background:#663300;opacity:0.7;border-color:#ffffff;color:white;font-size:20px"></a>
<a href="mgrstatus_quo.php"><input type=button value='Status quo' style="height:100px;width:200px;border-radius:20px;background:#663300;opacity:0.7;border-color:#ffffff;color:white;font-size:20px"></a><br><br>

<a href="prod_in.php"><input type=button value='Product In' style="height:100px;width:200px;border-radius:20px;background:#663300;opacity:0.7;border-color:#ffffff;color:white;font-size:20px"></a>
<a href="prod_out.php"><input type=button value='Product Out' style="height:100px;width:200px;border-radius:20px;background:#663300;opacity:0.7;border-color:#ffffff;color:white;font-size:20px"></a><br><br>
</div>
<br><br><br><br><br><br>
<div style="float:right"><center>
<div style="width:380px;height:250px;padding-right:10;border-radius:20px;border:2px solid #ffffff;opacity:0.7;background:#663300">
<br><b><h2><font color=white>WAREHOUSE <br>TRANSACTIONS</b><br><br>
<form action="wt.php" method="post" style="padding-left:0">
<input type="date" name="date" style="height:30px;width:200px;padding:7px;border-color:white;border-radius:20px"><br><br>
<input type=submit value='Submit' style="height:30px;width:80px;border-radius:20px;background:#663300;opacity:0.7;border-color:#ffffff;color:white"">
</center></form></div></div>


</body>
</html>
