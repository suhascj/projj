<html>
<head>
<title>Inventory</title>
<style>


body{
background-size:100% 100%;

margin:100;
}
table tr{
font-size:20px;
}
table td{
width:200px;
color:white;
}
input[type=button]{
background-color:#663300;
border-color:black;
border-radius:20px;
opacity:0.7;
color:white;
border:1px solid #0;
}
</style>
<body background="images/3.png">
<center>

<div style="width:500px;float:left;border:2px solid #000000;background:#663300;opacity:0.8;border-radius:20px">

<?php


session_start();

$conn=mysqli_connect("localhost","root","","inventory") or die("failed:" . mysqli_connect_error());
$date=$_POST['date'];
echo "<h1><i><font color=white>Products in on ".$date."<hr></h1>";
$sql = "select * from prod_in where DATE_IN='$date'";
$result=mysqli_query($conn,$sql) or die("failed".mysqli_error($conn));
echo "<table><tr><td><b>PRODUCT ID<Hr></td><td><b>QUANTITY<hr></td></tR>";
while($row=mysqli_fetch_assoc($result))
{
	echo "<tr><td>".$row['PID']."</td><td>".$row['QNTY_IN']."</td></tr>";
	
}

echo "</table>";

	

$conn->close();
?>
</div>

<div style="width:500px;float:right;border:2px solid #000000;background:#663300;opacity:0.8;border-radius:20px">

<?php



$conn=mysqli_connect("localhost","root","","inventory") or die("failed:" . mysqli_connect_error());
$date=$_POST['date'];
echo "<h1><i><font color=white>Products out on ".$date."<hr></h1>";
$sql = "select * from prod_out where DATE_OUT='$date'";
$result=mysqli_query($conn,$sql) or die("failed");
echo "<table><tr><td><b>PRODUCT ID<Hr></td><td><b>QUANTITY<hr></td></tR>";
while($row=mysqli_fetch_assoc($result))
{
	echo "<tr><td>".$row['PID']."</td><td>".$row['QNTY_OUT']."</td></tr>";
	
}

echo "</table>";

	

$conn->close();
?>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>

<a href="mgr_home.php"><input type=button value="Back" style="width:70px;height:35px;border-radius:20px"></a>


</center>
</body>
</head>
</html>