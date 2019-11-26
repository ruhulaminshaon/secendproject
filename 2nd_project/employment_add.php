
<?php
error_reporting(E_ALL);
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['employment_save'])){
		include("config.php");
		//$err = 0;
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
		{
			echo "Invalid email format";$err = 1;
		}//end if
		//if(strlen($_POST["phone_number"])>11 OR strlen($_POST["phone_number"])<11){$err_message= "Your Phone number is wrong";$err = 1;}
		if(file_exists("image/".$_FILES['user_image']['name']))
		{
			$filename=time()."_".str_replace("","",basename($_FILES['user_image']['name']));			
		}//end if
		else
		{
			$filename=$_FILES['user_image']['name'];
		}//end else

		$temp_name=$_FILES['user_image']['tmp_name'];
		
		if(move_uploaded_file($temp_name,"image/".$filename))
		{
			$sql="INSERT INTO employment ( name,email,phone,address,image,dep_id,des_id,status) VALUES( ?,?,?,?,?,?,?,? )";
			$conn=$db ->prepare($sql);
			$result=$conn->execute(array($_POST['name'],$_POST['email'],$_POST['phone_number'],$_POST['address'],$filename,	$_POST['dep_id'],$_POST['des_id'],$_POST['status']));
		}//end if
	}
}
function test_input($data){
	$data=trim($data);
	$data=stripslashed($data);
	$data=htmlspecialchars($data);
	return $data;
}
?>
<?php include('admin_header.php');?>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>	
      
  <div class="content-wrapper">
  	<div class="panel panel-default">
  		<div class="panel-body">
  			<?php
  			if(isset($result)){
  				echo"<h2 style='color:green;'>Success</h2>";
  			}
  			?>
  		</div>
  	</div>

    <div class="container-fluid">
      <h2>Employement Add</h2>
      <p><span class="error" style="color:red;">* required field.</span></p>
	  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
		  <label for="name">Name:</label>
		  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required><span style="color:red;">*</span>
		</div>
		<div class="form-group">
		  <label for="email">Email:</label>
		  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  required><span style="color:red;">*</span>
		</div>
		<div class="form-group">
		  <label for="phone_number">Phone Number:</label>
		  
		  <input type="number" class="form-control" id="phone_number" placeholder="Enter phone number" name="phone_number">
		</div>
		<div class="form-group">
		  <label for="address">Address:</label>
		  <textarea class="form-control" id="address" name="address"></textarea>
		</div>
		<div class="form-group">
		  <label for="image">Image:</label>
		  <input type="file" class="form-control" id="image" name="user_image">
		</div>
		<div class="form-group">
		  <label for="department_ID">Department ID:</label>				 
				 
		  <select class="form-control" name="dep_id">
			<option>Select Department ID</option>
			<?php
				$conn=$db->prepare("SELECT * FROM department");
				$conn->execute();
				$result=$conn->fetchAll(PDO::FETCH_ASSOC);				
				foreach($result as $key){					
			?>
			<option value="<?php echo $key['id'];?>"><?php echo $key['dep_name'];?></option>
			<?php	
				}
			?>			
		  </select>
		</div>
		<div class="form-group">
		  <label for="desination_id">Desination ID:</label>
		  <select class="form-control"  name="des_id" >
				<option>Select Desination ID</option>
				<?php
				$conn=$db->prepare("SELECT * FROM desination");
				$conn->execute();
				$result=$conn->fetchAll(PDO::FETCH_ASSOC);				
				foreach($result as $key){
			?>
				<option value="<?php echo $key['id'];?>"><?php echo $key['des_name'];?></option>
			<?php					
				}
			?>
		  </select>
		</div>
		
		<div class="form-group">
		  <label for="status">status:</label>
			<input type="radio" name="status" value="0" >Yes
			<input type="radio" name="status" value="1" checked="checked">NO
		</div>
		<button type="submit" name="employment_save" class="btn btn-info btn-block">Employment_save</button>
	  </form>        
    </div>

    <!-- /.container-fluid-->
<?php include('admin_footer.php');?>
