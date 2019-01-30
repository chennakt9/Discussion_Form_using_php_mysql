<?php
session_start();

if(isset($_SESSION['uid'])){
	echo $_SESSION['uid'];
	
	
}
else{
	header('location:login.php');
	
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>TALAKAYAN</title>
	<style type="text/css">
		body {
	background-image: url(http://flashwallpapers.com/wp-content/uploads/2015/10/Pure-Bright-Sunny-Ocean-Beach.jpg);
	background-size: 350px 600px;
	}
	</style>
</head>
<body>
	<h4 align="right" class="h4"><a href="logout.php">Log out</a></h4>
	<div class="home" align="center">
		<h1 style="background-color: #530602; color:#fff;">dɪˈskʌʃ(ə)n</h1>
	</div>
	<hr/>
	<div class="cat" align="center">
		<hr/>
		<?php
		include("connect.php");
		$sql="SELECT * FROM `category` ORDER BY `category_title` ASC";
		$res=mysqli_query($conn,$sql);
		
		
		if(mysqli_num_rows($res)>0){
			while ($row=mysqli_fetch_assoc($res)) {
				
				$id=$row['id'];
				$title=$row['category_title'];
				$description=$row['category_description'];

				?>

				<table>
					<tr>
						<a href=<?php echo "view_category.php?cid=".$id." ".$title; ?>><?php echo $title; ?></a>
					</tr>
				</table>

				<?php
				
				
			}
			
			



		}
		else{
			echo "<h4>There are no categories available yet</h4>";
		}


		?>

	</div>
</body>
</html>
