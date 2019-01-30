<?php
session_start();

if(isset($_SESSION['uid'])){
	
	
	echo $_SESSION['uid'].'<br/>';
	
	
}
else{
	header('location:login.php');
	
}


$cid=$_POST['cid'];
$tid=$_POST['tid'];
echo $cid.'<br/>';
echo $tid.'<br/>';




if(isset($_POST['reply_submit'])){

	if($_POST['reply_content']==""){
		header('location:post_reply.php?cid='.$cid.'&tid='.$tid);
	}
	else{
		include('connect.php');
		$creator=$_SESSION['uid'];
		$cid=$_POST['cid'];
		$tid=$_POST['tid'];
		$reply_content=$_POST['reply_content'];

		//Insert into posts1
		$sql="INSERT INTO `posts1`(`category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES ('".$cid."','".$tid."','".$creator."','".$reply_content."',now())";
		$res=mysqli_query($conn,$sql);

		
		
		//Update
		$sql2="UPDATE `category` SET `last_post_date`=now(),`last_user_posted`='".$creator."' WHERE `id`='".$cid."'";
		$res2=mysqli_query($conn,$sql2);

		

		//Upadate2
		$sql3="UPDATE `topics` SET `topic_last_user`='".$creator."',`topic_reply_daye`=now() WHERE `id`='".$tid."'";
		$res3=mysqli_query($conn,$sql3);

		

		if(($res) && ($res2) && ($res3)){
			echo "Success";

			$sql4="SELECT * FROM `topics` WHERE `category_id`='".$cid."' AND `id`='".$tid."'";
			$res4=mysqli_query($conn,$sql4);

			while ($row4=mysqli_fetch_assoc($res4)) {
				# code...

				$old_replies=$row4['topic_replies'];
				$new_replies=$row4['topic_replies']+1;
				$sql5="UPDATE `topics` SET `topic_replies`='".$new_replies."' WHERE `category_id`='".$cid."' AND `id`='".$tid."'";
				$res5=mysqli_query($conn,$sql5);

				//Redirect to view_topic page
				header('location:view_topic.php?cid='.$cid.'&tid='.$tid);

				
			}


		}
		else{
			echo "There was a problem posting your reply.Try again later";

			//Redirect to post_reply page
			header('location:post_reply.php?cid='.$cid.'&tid='.$tid);

		}



	}
}

?>