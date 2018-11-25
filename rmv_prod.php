<?php

session_start();
$pid=$_POST['pid'];
$wid=$_POST['wid'];
$date_out=$_POST['date_out'];
$qty=$_POST['qty'];

$conn=mysqli_connect("localhost","root","","inventory") or die("failed:" . mysqli_connect_error());

	$sql = mysqli_query($conn,"insert into prod_out (PID,DATE_OUT,QNTY_OUT,WID) values ($pid,'$date_out',$qty,$wid)");
$_SESSION['tri']=mysqli_error($conn);
header('location:/inventory/prod_out.php');

	


if ($sql) {

	$sql = mysqli_query($conn,"update prod_info set PQNTY=PQNTY-$qty where PID=$pid and WID=$wid") or die("kh".mysqli_error($conn));
	$_SESSION['sucess']="Product added!!";
	header('location:/inventory/mgr_home.php');
} 



$conn->close();
?>