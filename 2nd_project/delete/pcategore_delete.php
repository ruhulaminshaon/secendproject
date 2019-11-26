<?php
include('../config.php');
if(isset($_REQUEST['id'])){
	$id=$_REQUEST['id'];
	$del=$db->prepare("DELETE FROM product_categories WHERE id=? ");
	$delete_success=$del->execute(array($id));
	if($delete_success){
		$delete_success="<div class='alert alert-danger'>Delete Success!</div>";
	}else{
		$delete_success="<div class='alert alert-warning'>Some Thing wrong!</div>";
	}
		header("location:../Productcategories_show.php");
}else{
	header("location:../Productcategories_show.php");
}
?>