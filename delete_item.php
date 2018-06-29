<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM cart WHERE id='$id'";
if($conn->query($sql)===TRUE){
	header("Location: cart.php");
	exit;
}
else
echo "error".$name;
?> 
