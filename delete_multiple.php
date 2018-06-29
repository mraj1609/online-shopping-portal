<?php
include 'connect.php';
if(!empty($_POST['check_list'])){
	foreach($_POST['check_list'] as $id){
		$sql = "DELETE FROM cart WHERE id='$id'";
		if($conn->query($sql)!==TRUE)
			echo "error in delete";
	}
}
header("Location: cart.php");
exit;
?> 
