<?php
include '../connect.php';
$sql="select username from users";
$res=$conn->query($sql);
while($row=$res->fetch_assoc()){
	$sql="update users set role='{$_GET[$row['username']]}' where username = '{$row['username']}'";
	if($conn->query($sql)!==TRUE)
		die("error in role change");
}
echo "Roles updated";
?>

