<?php
include('../config.php');
if(isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$del=$db->prepare("DELETE FROM desination WHERE des_id=?");
	$del->execute(array($id));
	header("location:../desination_show.php");
}else{
	header("location:../desination_show.php");
}
?>
