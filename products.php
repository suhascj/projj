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
color:white;
}
input[type=button]{
background-color:black;
border-color:#000000;
border-radius:20px;
opacity:0.8;

color:white;
border:1px solid #0;
}
</style>
<body background="3.png">
<center>


<div style="width:830px;border:2px solid #000000;background:#663300;opacity:0.8;border-radius:20px">

<?php


session_start();

$conn=mysqli_connect("localhost","root","","inventory") or die("failed:" . mysqli_connect_error());


$sql = "select * from product";
$result=mysqli_query($conn,$sql) or die("failed");
echo "<table><tr><td><b>PRODUCT ID<Hr></td><td><b>NAME<hr></td><td><b>PRICE<hr></td></tR>";
while($row=mysqli_fetch_assoc($result))
{
	echo "<tr><td>".$row['PID']."</td><td>".$row['PNAME']."</td><td> ".$row['PRICE']."</td></tr>";
	
}

echo "</table>";

	

$conn->close();
?>
</div>
<br><br>
<a href="owner_home.php"><input type=button value="Back" style="width:70px;height:35px;border-radius:20px;background:#663300;"></a>


</center>
</body>
</head>
</html>
