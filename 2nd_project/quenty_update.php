<?php
include('config.php');
if(isset($_GET['hidden_id'])){
	$hiddent_id=$_GET['hidden_id'];
	if(empty($_POST['qut'])){
		echo""; 
	}
		$sql="UPDATE tbl_cart_temp SET product_sales_quantity=? WHERE id=?";
		$conn=$db->prepare($sql);
		$conn->execute(array($_POST['qut'],$hiddent_id));
}
?>