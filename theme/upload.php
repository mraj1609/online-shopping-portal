<?php
include "../connect.php" ;

if(is_uploaded_file($_FILES['item_file']['tmp_name'])){
	copy($_FILES['item_file']['tmp_name'],"data.csv");

$sql="load data local infile '/var/www/html/theme/data.csv' into table items fields terminated by ',' enclosed by '\"' lines terminated by '\n';";
if($conn->query($sql)===FALSE)
	die("error");
else
	header("Location: items.php?upload");
	exit();
}
?>
