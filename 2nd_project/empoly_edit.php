<?php
error_reporting(E_ALL);
include('config.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['employment_update'])){
		if(isset($_FILES['user_image']['name']) && $_FILES['user_image']['name'] != ''){	

			if(file_exists("image/".$_FILES['user_image']['name']))
			{
				$filename=time()."_".str_replace("","",basename($_FILES['user_image']['name']));			
			}
			else
			{
				$filename=$_FILES['user_image']['name'];
			}		
			
			$temp_name=$_FILES['user_image']['tmp_name'];
				if(move_uploaded_file($temp_name,"image/".$filename))
				{
				
					$id=$_REQUEST['id'];
					$conn=$db->prepare("select image from employment where id=?");
					$conn->execute(array($_REQUEST['id']));
					$imgRow=$conn->fetch(PDO::FETCH_ASSOC);
					unlink("image/".$imgRow['image']);
				}
		}
		else{
			$filename = $_POST['pre_image']	;
		}
		$sql="UPDATE employment SET name=? ,email=? ,phone_number=? ,address=?,image=?,dep_id=?,des_id=?,status=? WHERE id=?";
			$conn=$db->prepare($sql);									
			$rock=$conn->execute(array($_POST['name'],$_POST['email'],$_POST['phone_number'],$_POST['address'],$filename,$_POST['dep_id'],$_POST['des_id'],$_POST['status'],$_REQUEST['id']));	

	}
}
?>
<?php include('admin_header.php');?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>    
	
     
  <div class="content-wrapper">
  <!--old show select code-->
		<?php
		 $conn=$db->prepare("select * from employment e , desination des ,department d where e.des_id=des.des_id and e.dep_id=d.dep_id and e.id=?");			
		$conn->execute(array($_REQUEST['id']));
		
		  $result=$conn->fetchAll(PDO::FETCH_ASSOC);
		  foreach($result as $row){
		?>
    <div class="container-fluid">
    	<a href="employment_show.php"><button type="button" class="btn btn-info">Back</button></a>
    	<?php 
    	if(isset($rock)){
    		echo"<h2 style='color:green;'>Update Success</h2>";
    	}
    	?>
      <h2>Employee Update</h2>
	  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<!--input type="hidden" name="id" value="<?php //echo $row['id'];?>"-->
		
		<div class="form-group">
		  <label for="name">Name:</label>
		  <input type="text" class="form-control" id="name" placeholder="Enter department" name="name" value="<?php echo $row['name'];?>" required>
		</div>		
		<div class="form-group">
		  <label for="email">Email:</label>
		  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email'];?>"  required>
		</div>		
		<div class="form-group">
		  <label for="phone_number">Phone Number:</label>
		  <input type="number" class="form-control" id="phone_number" placeholder="Enter phone number" name="phone_number" value="<?php echo $row['phone_number'];?>">
		</div>		
		<div class="form-group">
		  <label for="address">Address:</label>
		  <textarea class="form-control" id="address" name="address"><?php echo $row['address'];?></textarea>
		</div>
		
		<div class="form-group">
		  <label for="image">Image<img src="image/<?php echo $row['image'];?>"  width="304px" height="236px"></label>
		  	  <input type="file" class="form-control" id="image" name="user_image" >
			<?php 
			if($row['image'] != "")
			{
			?>
			 <input type="hidden" name="pre_image" value="<?php echo $row['image']; ?>" >
			<?php 
			} 
			?>
		</div>
		
		<div class="form-group">
		  <label for="department_ID">Department ID:</label>				 
		  <select class="form-control" name="dep_id" >
			
				<?php
					$sql="select * from department";
					$conn=$db->prepare($sql);
					$conn->execute();
					$result=$conn->fetchAll(PDO::FETCH_ASSOC);
					if($result){
						foreach($result as $key){
				?>
				<option value="<?php echo $key['dep_id'];?>" <?php if($key['dep_id'] == $row['dep_id']) {?> selected="selected" <?php } ?>  ><?php echo $key['dep_name'];?></option>
				<?php
						}
					}
				?>
		  </select>
		</div>
		
		<div class="form-group">
		  <label for="desination_id">Desination ID:</label>
		  <select class="form-control" name="des_id">
				<?php
					$sql="select * from desination";
					$conn=$db->prepare($sql);
					$conn->execute();
					$result=$conn->fetchAll(PDO::FETCH_ASSOC);
					if($result){
						foreach($result as $key){
				?>
				<option value="<?php echo $key['des_id'];?>" <?php if($key['des_id'] == $row['des_id']) {?> selected="selected" <?php } ?>  ><?php echo $key['desination_name'];?></option>
				<?php
						}
					}
				?>
		  </select>
		</div>
		
		<div class="form-group">
		  <label for="status">status:</label>
		   	<input type="radio" name="status" value="Yes" <?php if( $row['status']=='Yes'){ ?> checked="checked"<?php } ?> >Yes
		  	<input type="radio" name="status" value="No" <?php if($row['status']=='No'){ ?> checked="checked"<?php } ?>>No
		</div>

		<button type="submit" name="employment_update" value="udpadet" class="btn btn-info btn-block">Update</button>
	  </form>        
    </div>
<?php  
	}
?>
<?php include('admin_footer.php');?>