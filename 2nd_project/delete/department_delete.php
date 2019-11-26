<?php
include('../config.php');
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$del=$db->prepare("DELETE FROM department WHERE dep_id=? ");
		$del->execute(array($id));
		header("location:../department_show.php");
	}else{
		header("location:../department_show.php");
	}

?>
