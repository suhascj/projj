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
background-color:#663300;
border-color:black;
border-radius:20px;
opacity:0.8;
color:white;
border:1px solid #0;
}
</style>
<body background="3.png">
<center>


<div style="width:800px;border:2px solid #000000;background:#663300;opacity:0.8;border-radius:20px">

<?php


session_start();

$conn=mysqli_connect("localhost","root","","inventory") or die("failed:" . mysqli_connect_error());

$pid=$_POST['pid'];
$sql = "select * from prod_info where PID=$pid";
$result=mysqli_query($conn,$sql) or die("failed");
echo "<table><tr><td><b>PRODUCT ID<Hr></td><td><b>WAREHOUSE ID<hr></td><td><b>QUANTITY<hr></td></tR>";
while($row=mysqli_fetch_assoc($result))
{
	echo "<tr><td>".$row['PID']."</td><td>".$row['WID']."</td><td> ".$row['PQNTY']."</td></tr>";
	
}

echo "</table>";

	

$conn->close();
?>
</div>
<br><br>
<a href="product_info.php"><input type=button value="Back" style="width:70px;height:35px;border-radius:20px"></a>


</center>
</body>
</head>
</html>
