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
	<link rel="stylesheet" type="text/css" href="homecs.css">
</head>
<body>
	<div class="home" align="center">
		<h4 align="right" class="h4" style="color: white"><a href="logout.php">Log out</a></h4>
		<h1>dɪˈskʌʃ(ə)n</h1>

		<hr/>
	</div>
		<div class="view">
			<?php
			include('connect.php');
			$cid=$_GET['cid'];
			$tid=$_GET['tid'];
			echo $cid;
			echo $tid;

			$sql="SELECT * FROM `topics` WHERE `category_id`='".$cid."' AND `id`='".$tid."'";
			$res=mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0){
				?>
				<form action=<?php echo 'post_reply.php?cid='.$cid.'&tid='.$tid ?> method="POST">
					<input type="submit" name="post_reply" value="Add Reply">

					
				</form>
				<hr/>

				<?php
				while ($row=mysqli_fetch_assoc($res)) {

					$sql2="SELECT * FROM `posts1` WHERE `category_id`='".$cid."' AND `topic_id`='".$tid."'";
					$res2=mysqli_query($conn,$sql2);
					while ($row2=mysqli_fetch_assoc($res2)) {

						?>
						<table>
							
							<tr>
								<td>
									<p style=" color: red; min-height: 30px;line-height: 30px"; ><?php echo $row['topic_title']; ?><br/></p>

								</td>
								<td valign="top" style="border: 1px solid #000;min-width: 150px;" rowspan="4">
									<p align="center" style="line-height: 30px;">User Info</p>
									
								</td>


							</tr>
							<tr>
								<td>Post by: <?php echo $row2['post_creator']; ?></td>
								
							</tr>
							<tr>
								<td>On: <?php echo $row2['post_date']; ?></td>
								
							</tr>
							

							<tr>
								<td valign="top" style="min-height: 0;">
									<p style=" color :blue; max-width: 162.4px; overflow: scroll;"><?php echo $row2['post_content']; ?><br/></p>

								</td>


							</tr>
							
						</table>
						<?php

						# code...
					}
					$old_views=$row['topic_views'];
					$new_views=$row['topic_views']+1;
					$sql3="UPDATE `topics` SET `topic_views`='".$new_views."' WHERE `category_id`='".$cid."' AND `id`='".$tid."'";
					$res3=mysqli_query($conn,$sql3);
					
				}

			}else{
				echo "This topic doesnot exist";
			}

			?>
			
		

	
	</div>
</body>
</html>
