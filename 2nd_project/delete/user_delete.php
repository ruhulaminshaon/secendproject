<?php
include('../config.php');
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$conn=$db->prepare("select image from login where log_id=?");
		$conn->execute(array($_REQUEST['id']));
		$imgRow=$conn->fetch(PDO::FETCH_ASSOC);
		unlink("../image/".$imgRow['image']);
			
		$del=$db->prepare("DELETE FROM login WHERE log_id=? ");
		$del->execute(array($id));

		header("location:../user_show.php");
	}else{
		header("location:../user_show.php");
	}

?>