<?php
error_reporting(E_ALL);
include("config.php");

// echo"<pre>";
// print_r($_REQUEST);
// echo"</pre>";

// exit();


if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['user_save'])){		
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {echo "Invalid email format";$err = 1;}
		//if(strlen($_POST["phone_number"])>11 OR strlen($_POST["phone_number"])<11){$err_message= "Your Phone number is wrong";$err = 1;}
		if(isset($_POST['user_type_name'])){
			//$arr=array($_POST['add'],$_POST['edit'],$_POST['delete']);
			$arr=array();
			if(isset($_POST['view']))
				array_push($arr,$_POST['view']);
			if(isset($_POST['add']))
				array_push($arr,$_POST['add']);
			
			if(isset($_POST['edit']))
				array_push($arr,$_POST['edit']);
			
			if(isset($_POST['delete']))
				array_push($arr,$_POST['delete']);
			
			$role=implode(",", $arr);
		}
		if(file_exists("image/".$_FILES['user_image']['name']))
		{ $filename=time()."_".str_replace("","",basename($_FILES['user_image']['name']));	}
		else{	$filename=$_FILES['user_image']['name'];}
		$temp_name=$_FILES['user_image']['tmp_name'];
		if(move_uploaded_file($temp_name,"image/".$filename)){
			$sql="INSERT INTO login ( username,image,email,password,phone,user_type_name,role) VALUES( ?,?,?,?,?,?,? )";
			$conn=$db ->prepare($sql);
			$result=$conn->execute(array($_POST['username'],$filename,$_POST['email'],$_POST['password'],$_POST['phone_number'],$_POST['user_type_name'],$role));
		}
	}
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
      <h2>User Add Field:</h2>
      <p><span class="error" style="color:red;">* required field.</span></p>
	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
		  <label for="name">User Name:</label>
		  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="username" required><span style="color:red;">*</span>
		</div>
		<div class="form-group">
		  <label for="image">User Image:</label>
		  <input type="file" class="form-control" id="image" name="user_image">
		</div>
		<div class="form-group">
		  <label for="email">User Email:</label>
		  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  required><span style="color:red;">*</span>
		</div>
		<div class="form-group">
		  <label for="password">Password:</label>
		  <input type="password" class="form-control" id="pass" placeholder="Enter pass" name="password"  required><span style="color:red;">*</span>
		</div>
		<div class="form-group">
		  <label for="phone_number">User Phone Number:</label>
		  
		  <input type="number" class="form-control" id="phone_number" placeholder="Enter phone number" name="phone_number">
		</div>
				
		<div class="form-group">
		  <label for="user_id">Type of User:</label>
		  					 
			<input type="radio" name="user_type_name" value="admin" onclick="check()" >Admin
			<input type="radio" name="user_type_name" value="client" onclick="uncheck()">Client
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
		  	<input type="checkbox" name="view" id="mycheck1" value="view"  checked="checked">View
			<input type="checkbox" name="add" id="mycheck2" value="add" >Add
			<input type="checkbox" name="edit" id="mycheck3" value="edit">Edit
			<input type="checkbox" name="delete" id="mycheck4" value="delete">Delete
		</div>
		<button type="submit" name="user_save" class="btn btn-info btn-block">user_save</button>
	  </form>        
    </div>
    <!-- /.container-fluid-->
<?php include('admin_footer.php');?>