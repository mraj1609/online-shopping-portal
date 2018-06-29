<?php
include 'connect.php';
$stmt=$conn->prepare("insert into items (category,title,company,price,quantity) values (?,?,?,?,?)");
$stmt->bind_param("sssii",$cat,$title,$company,$price,$qty);
$cat=$_POST['cat'];
$title=$_POST['title'];
$company=$_POST['company'];
$price=$_POST['price'];
$qty=$_POST['qty'];
$stmt->execute();
$stmt->close();

header("Location: home.php");
exit();
?>
