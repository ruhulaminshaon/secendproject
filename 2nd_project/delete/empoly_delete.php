<?php
include('../config.php');
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$conn=$db->prepare("select image from employment where id=?");
		$conn->execute(array($_REQUEST['id']));
		$imgRow=$conn->fetch(PDO::FETCH_ASSOC);
		unlink("../image/".$imgRow['image']);
			
		$del=$db->prepare("DELETE FROM employment WHERE id=? ");
		$del->execute(array($id));

		header("location:../employment_show.php");
	}else{
		header("location:../employment_show.php");
	}

?>