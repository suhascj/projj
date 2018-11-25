<?php

session_start();
$pid=$_POST['pid'];
$wid=$_POST['wid'];
$date_in=$_POST['date_in'];
$qty=$_POST['qty'];


$conn=mysqli_connect("localhost","root","","inventory") or die("failed:" . mysqli_connect_error());

	$sql = mysqli_query($conn,"call add_prod($pid,'$date_in',$qty,$wid)") or die(mysqli_error($conn));
	


if ($sql) {

	$sql = mysqli_query($conn,"insert into prod_info (PID,PQNTY,WID) values($pid,$qty,$wid)") or mysqli_query($conn,"update prod_info set PQNTY=PQNTY+$qty where PID=$pid and WID=$wid");
	$_SESSION['sucess']="Product added!!";
	header('location:/inventory/mgr_home.php');
} 



$conn->close();
?>