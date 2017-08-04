<?php

require('includes/connection.php');

require('includes/sessions.php');


 if(isset($_POST['btn_login'])) {
 	
 	//form variables
 	$username=mysqli_real_escape_string($conn, $_POST['username']);
  $password=md5($_POST['password']);


    //sql statement
 	$query="SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";
 	$result=mysqli_query($conn,$query) or die("Query failed ".mysqli_error($conn));

 	//get rows if username and password exists
 	$num_rows= mysqli_fetch_array($result);
 
 //if user exist
 if($num_rows>0) {

 	//set session variable username
  $_SESSION['username'] = $username;
  header("Location:index.php");

 }
 else{  //else set error
  	    $error_msg=true;
  }

}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>
<div class="container">
<h4>Login Form</h4>
<?php 
if(isset($error_msg)) { echo '<div class="alert alert-danger">Access Denied!</div>'; }
	?>
	
<center><form method="post" action="login.php">
<div> 
	<input type="text" class="form-control" name ="username" placeholder="Enter Username">
</div>
<br>
<div>
	<input type="password" class="form-control" name ="password" placeholder="Enter Password">
</div>

<br>
<button type="submit" name="btn_login" style="width:100%;" class="btn btn-primary">login</button>

</form>
</center>

</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>