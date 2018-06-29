<?php
include '../connect.php';
$cat=$_GET['category'];
$title=$_GET['title'];
$company=$_GET['company'];
$price=$_GET['price'];
$qty=$_GET['qty'];

if(!isset($_GET['id'])){
	$stmt=$conn->prepare("insert into items (category,title,company,price,quantity) values (?,?,?,?,?)");
	$stmt->bind_param("sssii",$cat,$title,$company,$price,$qty);
	$stmt->execute();
	$stmt->close();	
	echo "Your entry was succesfully added";
}
else{
	$id=$_GET['id'];
	$sql="update items set category='$cat',title='$title',company='$company',price='$price',quantity='$qty' where id = '$id' ";
	if($conn->query($sql)===TRUE)
		echo "updated item with id =".$id;
	else
		echo "update failed";
}
?>
