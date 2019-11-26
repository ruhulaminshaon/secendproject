<?php
include('config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['changePassword'])){
		try{
			$num=0;
			$conn=$db->prepare("SELECT * FROM login WHERE password=?");
			$conn->execute(array($_POST['old_pass']));
			$num=$conn->rowCount();
			if($num==0){
				echo "Your Old Password is wrong!";
			}
			if($_POST['new_pass']!=$_POST['confirm_pass']){
				echo"New password not match";
			}
			$stament=$db->prepare("update login set password=? where loginID=1");
			$result=$stament->execute(array($_POST['new_pass']));

		}catch(PDOException $e){
			echo $e->getMessage();
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
    <title>Change Password</title>
  </head>
  <body>
  	<div class="login_from">
		<div class="container">
			<div class="panel panel-default">
			    <div class="panel-heading">
			    	<div class="top_section">
			    		<?php
			    		if(isset($result)){
			    			echo"<h2 style='color:green'>Success</h2>";
			    		}else{
			    			echo"<h2 style='color:red'>Your have problem</h2>";
			    		}
			    		?>
			    		<h2>Change Password</h2>
			    	</div><!--top_section-->		    	
			    </div><!--panel_heading-->
			    <div class="panel-body">
			    	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
			    		<div class="form-group">
			    			<label for="old_pass">Old Password</label>
			    			<input type="password" name="old_pass" class="form-control" id="pws" placeholder="Enter old_pass" required>
			    		</div>
			    		<div class="form-group">
			    			<label for="new_pass">New Password</label>
			    			<input type="password" name="new_pass" class="form-control" id="pws" placeholder="Enter new_pass" required>
			    		</div>
			    		<div class="form-group">
			    			<label for="confirm_pass">Confirm Password</label>
			    			<input type="password" name="confirm_pass" class="form-control" id="pws" placeholder="Enter confirm_pass" required>
			    		</div>
			    		<div class="form-group">
			    			<button class="btn btn-info btn-block" type="submit" name="changePassword">Change Password</button>
			    		</div>
			    		<div class="form-group">
			    			<a href="login.php" class="btn btn-danger">Back</a>
			    		</div>
			    	</form>
			    </div><!--panel_body-->
		    </div><!--panel panel_default-->
		</div><!--container-->
	</div><!--login_from-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>