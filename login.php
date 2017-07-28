
<?php //Start the Session
session_start();
$con=mysqli_connect("localhost","root","gameofthrones","DATABASE_NAME_HERE");
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM `user` WHERE username='$username' and
password='$password'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$count = mysqli_num_rows($result);
if ($count == 1){
$_SESSION['username'] = $username;
}else{
$fmsg = "Invalid Login Credentials.";
}
}
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
header("location:table.php");
}else{}
?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-
theme.min.css" >
<link rel="stylesheet" href="styles.css" >
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="container">
<div class="row">

<form class="form-signin" method="POST">
<h2 class="form-signin-heading">Login</h2>
<div class="input-group">

<input type="text" name="username" class="form-control" placeholder="Username"
required>


<input type="password" name="password" id="inputPassword" class="form-control"
 placeholder="Password" required>
<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</div>
</form>
</div>
</div>
</html>
