<?php
include("config.php");
if($_REQUEST['id']){
	$id=$_REQUEST['id'];
}else{
	header("location:desination_show.php");
}

?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['desination_update'])){
	
	      $sql = "select * from desination WHERE desination_name = '".$_POST['desination_name']."'";
	        $conn=$db->prepare($sql);
	        $conn->execute();
	        $re=$conn->rowCount();
	        if($re>0){
	          //$_SESSION['error']="Your Name is Allready execute";
	          //echo"Your Name is Allready execute";
	        	header('location:desination_show.php');
	        }else{

				$conn=$db->prepare("UPDATE desination 
										SET desination_name=? 
										WHERE des_id=?");									
				$result=$conn->execute(array($_POST['desination_name'], $_REQUEST['id']));	
			}
				
	}
}
?>
<?php include('admin_header.php');?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>               
  <div class="content-wrapper">
    <div class="container-fluid">
	
      <a href="desination_show.php"><button class="btn btn-primary">Back</button></a>
	 
      <h2>Desination</h2>
	  
	  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	  
		<div class="form-group">
		<?php 
			if(isset($result)){
			echo"<h2 style='color:green;'>Success</h2>";
			}
			?>
		
		  <label for="desination">Desination Name Update:</label>
		   <?php
		   
			$conn=$db->prepare("select * from desination where des_id=?");
			$conn->execute(array($id));
			$result=$conn->fetchAll(PDO::FETCH_ASSOC);			
			foreach($result as $row){
			
			?>
		  
		  <input type="text" class="form-control" id="desination" name="desination_name" value="<?php echo $row['desination_name'];?>" required>
		
		</div>	
		<?php
		}
		?>
		<button type="submit" name="desination_update" class="btn btn-info btn-block">Desination_Update</button>
		 
	  
	  </form>  
	 
      	
    </div>
    <!-- /.container-fluid-->
    

<?php include('admin_footer.php');?>

