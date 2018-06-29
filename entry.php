<?php
$severname = "localhost";
$username= "root";
$password= "mnirampivs";
$dbname= "myDB";

$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed:".$conn->connect_error);
}
$stmt = $conn->prepare("INSERT INTO entry VALUES (?,?,?)");
$stmt->bind_param("sii", $name, $age, $income);

$name= $_POST['name'];
$age = $_POST['age'];
$income= $_POST['income']; 

$stmt->execute();
$stmt->close();
header("Location: current_table.php");
$conn->close();
?>

