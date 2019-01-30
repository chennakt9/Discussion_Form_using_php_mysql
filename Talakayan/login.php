<?php
session_start();

if(isset($_SESSION['uid'])){
	header('location:home1.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login In to Talakayan</title>
	<style type="text/css">
		body {
			background-image: url(http://www.mobileswall.com/wp-content/uploads/2015/02/640-Amazing-Sunset-l.jpg);
			background-size: 400px 600px;
		}
	</style>
</head>
<body>

	<div id ="header">
		<h1 align="center" style="margin-top: 150px; margin-bottom: 0px; padding-bottom: 0; ">TAlaKaYan</h1>
		<h6 align="center" style="padding: 0;margin-top: 0;">A platform to discuss</h6>
	</div>
	<div id ="body">


		<form action="login.php" method="POST">
			<table align="center" ">
				<tr>
					<th>User Name</th><td><input type="text" name="username"></td>
				</tr>
				<tr>	
					<th>Password</th><td><input type="password" name="pass"></td>
				</tr>
				<tr>	
					<td colspan="2" align="center" style="padding-left: 50px;"><input type="submit" name="login" value="Log In"></td>
				</tr>
			</table>
		</form>

		
	</div>
</body>
</html>

<?php
include("connect.php");

if(isset($_POST['login'])){
	$uname=$_POST['username'];
	$passwd=$_POST['pass'];


	$qry="SELECT * FROM `users` WHERE `username`='$uname' AND `password`='$passwd'";
	$data=mysqli_query($conn,$qry);
	$row=mysqli_num_rows($data);	


	if($row<1){
		?>

		<h5 align="center" style="color: red">User Name or Password Incorrect</h5>

		<?php
		
	}
	else{
		$result=mysqli_fetch_assoc($data);
		$id=$result['id'];
		
		$_SESSION['uid']=$id;
		
		

		header('location:home1.php');
	}

}



?>