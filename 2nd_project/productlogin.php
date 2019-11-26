<?php
include('config.php');
include('home/header.php');
		//login
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['product_login'])){
		
		$conn=$db->prepare("SELECT * FROM publicsignup WHERE email=? AND password=?");
		$conn->execute(array($_POST['email'],$_POST['password']));
		$result=$conn->fetch(PDO::FETCH_ASSOC);
		if($result){
			$_SESSION['id']=$result['id'];
			$_SESSION['full_name']=$result['full_name'];
			$_SESSION['email']=$result['email'];
			$_SESSION['password']=$result['password'];
			$_SESSION['mobile_number']=$result['mobile_number'];


			header('Location:proceedcheckout.php');
			ob_end_flush();
		}
	}
}

		//register
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['signup'])){
		$conn=$db->prepare("SELECT * FROM publicsignup WHERE email=?");
		$conn->execute(array($_POST['email']));
		$result=$conn->fetch(PDO::FETCH_ASSOC);
		if($result){
			$err_message="<div class='alert alert-danger'><strong>This Email Address is Create.</div>";
		}
		else{
			
					
				$conn=$db->prepare("INSERT INTO publicsignup (full_name,email,password,mobile_number) VALUES(?,?,?,?)");
				$result=$conn->execute(array($_POST['full_name'],$_POST['email'],$_POST['password'],$_POST['mobile_number']));
					if($result){
						$_SESSION['id']=$result['id'];
						$_SESSION['full_name']=$result['full_name'];
						$_SESSION['email']=$result['email'];
						$_SESSION['password']=$result['password'];
						$_SESSION['mobile_number']=$result['mobile_number'];
						
					}
			
			header('Location:proceedcheckout.php');
			ob_end_flush();
		}
	}
}
?>
<!-- banner -->
	<div class="banner10" id="home1">
		<div class="container">
			<h2>Product</h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Product Signup</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
						<h3><strong>Login to your account</strong></h3>					
						<div class="form-group">
						  <label for="street">Email</label>
						  <input type="email" class="form-control" name="email" required>
						</div>
						<div class="form-group">
						  <label for="street">Password</label>
						  <input type="text" class="form-control" name="password" required>
						</div>
						<button type="submit" class="btn btn-warning" name="product_login" id="product_login">Login</button>					
					</form>
				</div>
				<div class="col-md-2">
					<div style="width: 50px;background: #DAA520;border-radius: 50px;padding: 12px;color: #fff;">OR</div>
				</div>
				<div class="col-md-5">
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
						<h3><strong>New User Signup</strong></h3>
						<?php
						if(isset($err_message)){
							echo $err_message; 
						}
						?>
						<div class="form-group">
						  <label for="full_name">Full Name</label>
						  <input type="text" class="form-control" id="full_name" name="full_name" required>
						</div>					
						<div class="form-group">
						  <label for="email">Email</label>
						  <input type="email" class="form-control" id="email" name="email" required>
						</div>
						<div class="form-group">
						  <label for="password">Password</label>
						  <input type="password" class="form-control" id="password" name="password" required>
						</div>
						<div class="form-group">
						  <label for="mobile_number">Mobile Number</label>
						  <input type="number" class="form-control" id="mobile_number" name="mobile_number" required>
						</div>
						<button type="submit" name="signup" class="btn btn-warning">Signup</button>
					</form>
				</div>
			</div>

		</div>
	</div>
	
<!-- //checkout -->
<?php
include('home/footer.php');
?>