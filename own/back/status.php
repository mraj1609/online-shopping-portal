<?php
include '../connect.php';
$sql="select id from orders";
$res=$conn->query($sql);
while($row=$res->fetch_assoc()){
	if(isset($_POST[$row['id']])){
		$sql="update orders set status='{$_POST[$row['id']]}' where id = '{$row['id']}'";
		if($conn->query($sql)!==TRUE)
			die("error in status change");
	}
}
echo "Status updated";
?>

