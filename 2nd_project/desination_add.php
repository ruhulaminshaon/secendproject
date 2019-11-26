<?php 
include('config.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['desination_save'])){
		$conn=$db->prepare("SELECT * FROM  desination WHERE des_name=?");
    $conn->execute(array($_POST['des_name']));
    $res=$conn->rowCount();
    if($res>0){
      $err_message= "Your Name is Allready execute";
    }else{
			$conn=$db->prepare("INSERT INTO desination(des_name) values (?)");
			$result=$conn->execute(array($_POST["des_name"]));
    }
		
	}
}
?>
<?php include('admin_header.php');?>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>               
        
	
     
  <div class="content-wrapper">
    <div class="container-fluid">
      
        <?php
        if(isset($result)){
          echo"<h3 style='color:green;'>Success</h3>";
        }
        ?>
      
        <h2>Desination Add</h2> 
      <div class="alert alert-warning"> 
    	  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      		<div class="form-group">
      		  <label for="desination">Desination Name:</label>
      		  <input type="text" class="form-control" id="desination" placeholder="Enter desination" name="des_name" required>
      		</div>		
      		<button type="submit" name="desination_save" class="btn btn-info btn-block">Save</button>
    	  </form>  
      </div>
	  
      
    </div>
    <!-- /.container-fluid-->
   

<?php include('admin_footer.php');?>

