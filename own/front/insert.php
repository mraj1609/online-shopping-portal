<?php
session_start();
?>
<?php

include 'connect.php';

$stmt= $conn->prepare("INSERT INTO cart (username,item_id,qty)VALUES (?,?,?)");
$stmt->bind_param("sii",$uname,$id,$qty);

$qty= $_POST['qty'];
$id= $_POST['id'];
$uname= $_SESSION['uname'];

$stmt->execute();
$stmt->close();
header('Location: cart.php');
?>
