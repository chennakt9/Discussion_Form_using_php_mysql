<?php  
session_start();

if(isset($_SESSION['uid'])){
	echo $_SESSION['uid'];
	

}
else{
	header('location:login.php');
}






$cid=$_POST['cid'];
echo $cid;
if(isset($_POST['topic_submit'])){

	if( $_POST['topic_title']==""){
			
		header('location:create_topic.php?cid='.$cid);
	
	}else{

		include('connect.php');
		$cid=$_POST['cid'];
		$title=$_POST['topic_title'];
		$creator=$_SESSION['uid'];
		echo $_SESSION['uid'];

		//Inserting into topics
		$sql="INSERT INTO `topics`(`category_id`, `topic_title`, `topic_creator`, `topic_date`, `topic_reply_daye`) VALUES ('".$cid."','".$title."','".$creator."',now(),now())";
		$res=mysqli_query($conn,$sql);
		$new_topic_id=mysqli_insert_id($conn);
		echo $new_topic_id;
		if ($res) {
			echo "Success1";
			# code...
		}

		//Insert content into posts1
		$sql2="INSERT INTO `posts1`(`category_id`, `topic_id`, `post_creator`, `post_date`) VALUES ('".$cid."','".$new_topic_id."','".$creator."',now())";
		$res2=mysqli_query($conn,$sql2);

		if ($res2) {
			echo "Success2";
			# code...
		}

		//Updating dates and last users
		$sql3="UPDATE `category` SET `last_post_date`=now(),`last_user_posted`='".$creator."' WHERE `id`='".$cid."'";
		$res3=mysqli_query($conn,$sql3);

		if ($res3) {
			echo "Success3";
			# code...
		}

		if(($res) && ($res2) && ($res3)){
			header("location:view_topic.php?cid=".$cid."&tid=".$new_topic_id);
			

		}else{
			echo "There was a problem creating your topic . Please try again.";
			header('location:create_topic.php?cid='.$cid);
		}




		

	}

}
?>