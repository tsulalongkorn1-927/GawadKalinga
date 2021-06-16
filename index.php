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
		if(isset($_POST['submit'])){
			$id = $_POST['id'];
		    $fullname = $_POST['fullname'];
		    $username = $_POST['username'];
		    $password = md5($_POST['password']);
		    
		    $sql = "INSERT INTO forlogin (id, fullname, username, password) VALUES('$id', '$fullname', '$username', '$password')";
			$result = $conn->query($sql);
			 
		}
		$sql = "SELECT * FROM forlogin ORDER BY id DESC";
		$result2 = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registered Members</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/all.js"></script>
	
</head>
<body>
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

	if(isset($_POST['search'])){
		$name = $_POST['name'];
	    $sql = "SELECT * FROM forlogin WHERE fullname LIKE '%$name%' ";
		$result = $conn->query($sql);
	}else{

	$sql = "SELECT * FROM forlogin";
	$name="";
}
		$result = $conn->query($sql);
?>
	<form action="" method="POST">
		<div style="margin-top: 8%; margin-left: 77%">
			<input type="text" name="name" placeholder="Search Name" value="<?php  echo $name; ?>">
			<button type="submit" name="search" class="btn btn-secondary" >Search</button>
		</div>
	</form>


<!-- Modal -->
<div class="modal fade" id="member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Volunteers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="index.php" method="POST">
      <div class="modal-body">
  			<div class="form-group">
    			<label>id</label>
    			<input type="text" name="id" class="form-control"  placeholder="Enter Volunteer ID">
  
  			</div>
  				<div class="form-group">
   				 <label>Fullname</label>
    			<input type="text" name="fullname" class="form-control"  placeholder="Enter Fullname">
 				 </div>

 				 <div class="form-group">
   				 <label>Username</label>
    			<input type="text" name="username" class="form-control"  placeholder="Enter Username">
 				 </div>

 				 <div class="form-group">
   				 <label>Password</label>
    			<input type="text" name="password" class="form-control"  placeholder="Enter Password">
 				 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit"  class="btn btn-primary">Save Data</button>
      </div>
      </form>
      </div>
    </div>
  </div>


			<div class="container">
	  			<form action="" method="POST">
	  				<button style="margin-top: 1%; margin-left: 100%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#member">
 + ADD Data
</button>
	  			</form>
	  		</div>

	<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color:">
<div class="container-fluid">
	<a class="navbar-brand" href="#">&copy; GK Volunteers</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>	
	</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a class="nav-link" href="index.html"><b>Back to Home Page</b></a></li>
			
			</ul>
		</div>
	</div>
</nav>
	  		<table class="table table-bordered  table-hover" style="background-color: #99ff66;">

	  			<thead align="center" border="1">
					<tr>
						<th>Line #</th>
						<th>id</th>
						<th>Fullname</th>
						<th>Username</th>
						<th>Password</th>
						<th>Controls</th>
					</tr>
					<tbody id="result"></tbody>
					<?php
					$x = 0;
					while($row = mysqli_fetch_array($result2)){
						$x++;
						echo "<tr id='rows123'>
							<td>$x</td>
							<td>". $row['id'] ."</td>
							<td>". $row['fullname'] ."</td>
							<td>". $row['username'] ."</td>
							<td>". $row['password'] ."</td>
							<td>
								<center>
									<a href='foredit.php?
										id=".$row['id']."
										&fullname=".$row['fullname']."
										&username=".$row['username']."'>
										<button style='background-color:green;'class='btn grn'data-toggle='modal' data-target='member'>Edit</button>
									</a>
									<a href='fordeletion.php?
									id=".$row['id']."'>
										<button style='background-color:red;'class='btn rd'>Delete</button>
									</a>
								</center>
							</td>
						</tr>";
					}
					?>
				</table>
			</td>
		</tr>
	<meta charset="UTF-8">
	<script src="jquery.min.js"></script>
	<script src="myjs.js"></script>
				
</body>
</html>