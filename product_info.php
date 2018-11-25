<html>
<head>
<title>Inventory</title>
<style>

h1{
background-color:#000000;
}
body{
background-size:100% 100%;

margin:50;
}

table tr{
font-size:20px;
}
table td{
width:200px;
}
input[type=button]{
border-radius:20px;
opacity:0.8;
background:#663300;
color:white;
border:1px solid #0;
}
</style>
<body background="3.png">

<center>




<?php


session_start();

$conn=mysqli_connect("localhost","root","","inventory") or die("failed:" . mysqli_connect_error());


$sql = "select PID from product";
$result=mysqli_query($conn,$sql) or die("failed");
echo "<table><tr>";
while($row=mysqli_fetch_assoc($result))
{
	echo "<td><form action=prd_info.php method=post><input type=submit value=".$row['PID']." name=pid style='width:100px;height:100px;font-size:50px;opacity:0.8;border-radius:20px;background-color:#663300;border-color:#000000;color:white;'></form></td>";
	
}

echo "</TR></table>";

	

$conn->close();
?>
<br><br>
<a href="owner_home.php"><input type=button value="Back" style="width:70px;height:35px;border-radius:20px;border-color:#000000"></a>


</center>
</body>
</head>
</html>
