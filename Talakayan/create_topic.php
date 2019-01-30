<?php
session_start();

if(isset($_SESSION['uid'])){
	$cid=$_GET['cid'];
	
	echo $_SESSION['uid'];
	
	
}
else{
	header('location:login.php');
	
}


	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="homecs.css">
</head>
<body>
	<h4 align="right" class="h4" style="color: white"><a href="logout.php">Log out</a></h4>
	<div class="home" align="center">
		<h1 class="stupid">dɪˈskʌʃ(ə)n</h1>

	</div>
	<hr/>
	<div class="cat" align="center">
		<hr/>
		<form action="create_topic_parse.php" method="POST">
			<p>Topic Description</p>
			<textarea  name="topic_title" rows="5" cols="30"></textarea>
			
			<br/><br/>
			<input type="hidden" name="cid" value="<?php echo $cid ?>">
			<input type="submit" name="topic_submit" value="Create your Topic">
			
		</form>
		<?php
		include("connect.php");
		
		echo $cid;
		
		

		?>

	</div>
</body>
</html>



