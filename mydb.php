 <?php
$servername = "localhost";
$username = "root";
$password = "mnirampivs";
$dbname = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo"in mydb.php";
// Create database
$stmt=$conn->prepare("INSERT INTO TRAINS VALUES (103,? ,?,?,200,156)") ;
$stmt->bind_param("sss",$tname,$src,$dest);
if($_SERVER["REQUEST_METHOD"] == 'POST')
{
        $tname= $_REQUEST['train_name'];
        $src= $_REQUEST['src'];
        $dest= $_REQUEST['dest'];
}
$stmt->execute();
$stmt->close();
$conn->close();
?> 
