<!DOCTYPE html>
<html>
<head>
	<title>Login In to Talakayan</title>
	<style type="text/css">
		body {
			background-image: url(https://awllpaper.com/wp-content/uploads/2018/02/scenery-wallpaper-for-mobile-fall-scenery-painting-wallpaper-768x1024.jpg);
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


		<form action="signup.php" method="POST">
			<table align="center" ">
				<tr>
					<th>Display Name:</th><td><input type="text" name="username"></td>
				</tr>
				<tr>
					<th>Roll Noumber:</th><td><input type="text" name="rollno"></td>
				</tr>
				<tr>	
					<th>Password  :</th><td><input type="password" name="pass"></td>
				</tr>
				<tr>	
					<th>Confirm Password:</th><td><input type="password" name="repass"></td>
				</tr>
				<tr>	
					<td colspan="4" align="center" style="padding-left: 100px;"><input type="submit" name="login" value="Log In"></td>
				</tr>
			</table>
		</form>

		
	</div>
</body>
</html>