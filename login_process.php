<?php


session_start();
$email=$_POST['email'];
$password=$_POST['password'];
$conn=mysqli_connect("localhost","root","","inventory") or die("failed:" . mysqli_connect_error());

if($email=="owner@gmail.com" and $password=="owner")
header('location:/inventory/owner_home.php');
else {
$result=mysqli_query($conn,"select * from login where USR_NME='$email' and PSS_WRD='$password'") or die(mysqli_error($conn));
$num_rows=mysqli_num_rows($result);

if($num_rows!=0){
while($row=mysqli_fetch_assoc($result))
{	
$_SESSION['mid']=$row['USR_NME'];

	header('location:/inventory/mgr_home.php');
}
 

}


else{
$_SESSION['warning']="Incorrect username or password!";
header('location:/inventory/index.php');	
}}
$conn->close();
?>