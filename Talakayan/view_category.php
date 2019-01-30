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
	<title></title>
	<style type="text/css">
		body {
	background-image: url(http://flashwallpapers.com/wp-content/uploads/2015/10/Pure-Bright-Sunny-Ocean-Beach.jpg);
	background-size: 350px 600px;
	}
	</style>
</head>
<body>
	<div class="home" align="center">
		<h4 align="right" class="h4" style="color: white"><a href="logout.php">Log out</a></h4>
		<h1>dɪˈskʌʃ(ə)n</h1>

	</div>
	<hr/>
	<div class="cat" align="center" style = "height: 400px; overflow: scroll;">
		<hr/>
		<?php
		include("connect.php");
		$cid=$_GET['cid'];
		echo $cid;
		?>
		<a href=<?php echo"create_topic.php?cid=".$cid; ?>>Click here to create a new Topic</a>
		<?php
		if(isset($_GET['cid'])){
			$logged=" | <a href='create_topic.php?cid=".$cid."'>Click here to Create a Form</a>";
			$sql="SELECT * FROM `topics` WHERE `category_id`='".$cid."' ORDER BY `topic_reply_daye` DESC";
			$res=mysqli_query($conn,$sql);

			if(mysqli_num_rows($res)>0){
				while ($row=mysqli_fetch_assoc($res)) {
					$tid=$row['id'];
					$title=$row['topic_title'];
					$views=$row['topic_views'];
					$date=$row['topic_date'];
					$creator=$row['topic_creator'];
					$replies=$row['topic_replies'];

				
				?>
					<table>
						<hr/>
						<tr style="background: #ddd;">
							<td>Topic Title</td>
							<td width="65" align="center">Replies</td>
							<td align="center" width="65">Views</td>
						</tr>
						<tr>
							<td colspan="3"><hr/></td>
						</tr>
						<tr>
							<td style = "overflow: scroll; width: 168px;"><a href=<?php echo "view_topic.php?cid=".$cid."&tid=".$tid;?>><?php echo $title; ?></a></td>
							<td width="65" align="center"><?php echo $replies; ?></td>
							<td align="center" width="65"><?php echo $views; ?></td>
						</tr>
						<tr>
							<td>on : <?php echo $date; ?></td>
						</tr>
						<tr>
							<td>by <?php echo $_SESSION['uid'];?></td>
						</tr>
					</table>
				<?php
			}
			}
			else{
				echo "<a href='home1.php'>Return to index Form</a><br/>";
				echo "You are trying to view a category that does not exist yet ".$logged;
			}
		}
		else{
			echo "There was an error fetching your data";
		}

		

		?>

	</div>
</body>
</html>
