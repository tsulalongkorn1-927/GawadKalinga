<?php
// Connecting Database here...
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password,"volunteer");
if ($conn->connect_error) {
    die("Cannot connect to database: " . $servername);
}
// End of Connecting Database...

$forlogin = $_GET['id'];

$sql = "DELETE FROM forlogin WHERE id=$forlogin";
$result = $conn->query($sql);
if($result){
	header("Location: index.php");
	echo "<script>alert('Successfully deleted!');</script>";
}
?>