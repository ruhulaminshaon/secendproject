<?php
error_reporting(E_ALL);

 //echo"<pre>";
 //print_r($_POST);
 //echo"</pre>";

 //exit();

include('config.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['user_update_save'])){
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
					$conn=$db->prepare("select image from login where id=?");
					$conn->execute(array($_REQUEST['id']));
					$imgRow=$conn->fetch(PDO::FETCH_ASSOC);
					unlink("image/".$imgRow['image']);
				}
				else
				{
					
				}
		}
		else{
			$filename = $_POST['pre_image']	;
		}
		
		$arr = array();
		if(isset($_POST['add']))
			array_push($arr,$_POST['add']);

		if(isset($_POST['edit']))			
			array_push($arr,$_POST['edit']);

		if(isset($_POST['delete']))			
			array_push($arr,$_POST['delete']);
		
		$role=implode(",", $arr);
		
		$sql="UPDATE login SET username=? ,image=?, email=?,password=?,phone=?,user_type_name=?,role=? WHERE id=?";
			$conn=$db->prepare($sql);									
			$result=$conn->execute(array($_POST['username'],$filename,$_POST['email'],$_POST['password'],$_POST['phone_number'],$_POST['user_type_name'],$role,$_REQUEST['id']));	

	}
}
?>
<?php include('admin_header.php');?>


    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>	
 
  <div class="content-wrapper">
  	<div class="container">
  		
  			<a href="user_show.php"><button class="btn btn-info ">Back</button></a>
  			<?php
  			if(isset($result)){
  				echo"<h2 style='color:green;'>Success</h2>";
  			}
  			?>
  		
  	</div>
    <div class="container-fluid">
    	
      <h2>User Edit Field:</h2>
      <?php
	  	$sql="SELECT * FROM login WHERE id=?";
	  	$conn=$db->prepare($sql);
	  	$conn->execute(array($_REQUEST['id']));
	  	$result=$conn->fetchAll(PDO::FETCH_ASSOC);
	  	echo "<pre>";
	  	print_r($result);
	  	echo "</pre>";
	  	foreach($result as $row){
	  	?>
      <p><span class="error" style="color:red;">* required field.</span></p>
	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
	  	<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
		<div class="form-group">
		  <label for="name">User Name:</label>
		  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="username" value="<?php echo $row['username'];?>" required><span style="color:red;">*</span>
		</div>
		<div class="form-group">
		  <label for="image">User Image:<img src="image/<?php echo $row['image'];?>" width="104px" height="60px"></label>
		  <input type="file" class="form-control" id="image" name="user_image">
		  <?php
		  if($row['image']!=""){
		  ?>
		   <input type="hidden" name="pre_image" value="<?php echo $row['image']; ?>">
		  <?php
		  }
		  ?>
		</div>
		<div class="form-group">
		  <label for="email">User Email:</label>
		  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email']; ?>" required><span style="color:red;">*</span>
		</div>
		
		<div class="form-group">
		  <label for="phone_number">User Phone Number:</label>
		  
		  <input type="number" class="form-control" id="phone_number" placeholder="Enter phone number" name="phone_number" value="<?php echo $row['phone'];?>">
		</div>
				
		<div class="form-group">
		  <label for="user_id">Type of User:</label>				 
			<input type="radio" name="user_type_name" value="admin" onclick="check()" <?php if($row['user_type_name']=="admin"){ ?> checked="checked" <?php } ?> >Admin
			<input type="radio" name="user_type_name" value="cliend" onclick="uncheck()" <?php if($row['user_type_name']=="cliend"){ ?> checked="checked"<?php } ?> >Cliend
		</div>
		<script>		
			function check(){
				document.getElementById("mycheck1").checked=true;
				document.getElementById("mycheck2").checked=true;
				document.getElementById("mycheck3").checked=true;
				document.getElementById("mycheck4").checked=true;
			}
			function uncheck(){
				document.getElementById("mycheck1").checked=false;
				document.getElementById("mycheck2").checked=false;
				document.getElementById("mycheck3").checked=false;
				document.getElementById("mycheck4").checked=false;
			}
		</script>
		
		<div class="form-group">
		  <label for="role">User Role:</label>
		  	<input type="checkbox" name="view" id="mycheck1" value="view" <?php if($row['role']=="view"){?> checked="checked" <?php } ?> >View
			<input type="checkbox" name="add" id="mycheck2" value="add" <?php if($row['role']=="add"){?> checked="checked" <?php } ?> >Add
			<input type="checkbox" name="edit" id="mycheck3" value="edit" <?php if($row['role']=="edit"){?> checked="checked" <?php } ?> >Edit
			<input type="checkbox" name="delete" id="mycheck4" value="delete" <?php if($row['role']=="delete"){ ?> checked="checked" <?php } ?> >Delete
		</div>
		<button type="submit" name="user_update_save" class="btn btn-info btn-block">User_Update_save</button>
		
	  </form>  
	  <?php
	}
	  ?>      
    </div>
    <!-- /.container-fluid-->
    
<?php include('admin_footer.php');?>