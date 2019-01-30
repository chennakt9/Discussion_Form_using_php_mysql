<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works

session_start();


if(isset($_SESSION['uid'])){
	
	
	echo $_SESSION['uid'].'<br/>';
	
	
}
else{
	header('location:login.php');
	
}
$cid=$_GET['cid'];
$tid=$_GET['tid'];
echo $cid.'<br/>';
echo $tid;
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="homecs.css">
</head>
<body>
	<div class="home" align="center">
		<h4 align="right" class="h4" style="color: white"><a href="logout.php">Log out</a></h4>
		<h1>dɪˈskʌʃ(ə)n</h1>

	</div>
	<hr/>
	<div class="cat" align="center">
		<hr/>
		<form action="post_reply_parse.php" method="POST">
			<p>Reply Content</p>
			<textarea name="reply_content" rows="5" cols="30"></textarea>
			<br/><br/>
			<input type="hidden" name="cid" value=<?php echo $cid; ?>>
			<input type="hidden" name="tid" value=<?php echo $tid; ?>>
			<input type="submit" name="reply_submit" value="Post Your Reply">

			
		</form>
		
		<?php
		include("connect.php");
		
		echo $cid;
		
		

		?>

	</div>
</body>
</html>
