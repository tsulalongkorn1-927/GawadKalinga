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

	if(isset($_POST['savechanges'])){
		$idedit = $_POST['idedit'];
	    $fullname = $_POST['fullname'];
	    $username = $_POST['username'];
	   
	    $sql = "UPDATE forlogin set fullname='$fullname', username='$username' WHERE id='".$idedit."'";
		$result = $conn->query($sql);
		if($result){
			echo "<script>alert('Successfully edited!');</script>";
			header("Location: index.php");
		}
	}else{
		$getID = $_GET['id'];
		$fullname = $_GET['fullname'];
		$username = $_GET['username'];
	}
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editing Page</title>
</head>
<body>
	<form method="POST" action="foredit.php?id=&fullname=&username=">
		<?php echo '<input type="hidden" name="idedit" readonly="" value="'.$getID.'">';?>
		Full Name: <?php echo '<input type="text" name="fullname" value="'.$fullname.'">';?><br><br>
		Username: <?php echo '<input type="text" name="username" value="'.$username.'">';?><br><br>
		<button type="submit" name="savechanges">Save Changes</button>
	</form>
</body>
</html>