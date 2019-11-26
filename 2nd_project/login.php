<?php
include_once('config.php');

session_start();
if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
	header('location:admin.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['login_button'])){
		$conn=$db->prepare("SELECT * FROM login WHERE username=? and password=?");
		$conn->execute(array($_POST['username'],$_POST['password']));
		$result=$conn->fetch(PDO::FETCH_ASSOC);
			if($result){
				$_SESSION['log_id']=$result['log_id'];
				$_SESSION['username']=$result['username'];
				$_SESSION['image']=$result['image'];
				$_SESSION['email']=$result['email'];
				$_SESSION['password']=$result['password'];
				$_SESSION['user_type_name']=$result['user_type_name'];
				$_SESSION['role']=$result['role'];
				header("location:admin.php");
		
			}else{
				header("location:admin.php");
			}
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin</title>
  </head>
  <body>
  <div class="hea">
  	<div class="login_from">
		<div class="container">
			<div class="panel panel-default">
			    <div class="panel-heading">
			    	<div class="top_section">
			    		<h2>Admin Login</h2>
			    	</div><!--top_section-->			    	
			    </div><!--panel_heading-->
			    <div class="panel-body">
			    	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
			    		<div class="form-group">
			    			<label for="username">User Name:</label>
			    			<input type="text" name="username" class="form-control" id="usernme" placeholder="Enter Username" required>
			    		</div>
			    		<div class="form-group">
			    			<label for="pass">Password:</label>
			    			<input type="password" name="password" class="form-control" id="pws" placeholder="Enter password" required>
			    		</div>
			    		<div class="form-group">
			    			<button class="btn btn-info btn-block" type="submit" name="login_button">Login</button>
			    		</div>
			    		<div class="form-group">
			    			<a href="change_password.php" class="btn btn-danger">Change_password</a>			
			    		</div>
			    	</form>
			    	<div class="panel-footer"><h5 style="text-align: center;">Shaon@ <?php echo date("Y");?></h5></div>
			    </div><!--panel_body-->
		    </div><!--panel panel_header-->
		</div><!--container-->
	</div><!--login_from-->
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>