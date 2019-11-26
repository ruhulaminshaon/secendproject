<?php
include('config.php');
include('home/header.php');
?>
<!-- banner -->
	<div class="banner10" id="home1">
		<div class="container">
			<h2>Proceed Checkout</h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Checkout</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3>WelCome 
						<a><span class="loginpage">
						<?php
    					if(isset($_SESSION['full_name'])){
    						echo $_SESSION['full_name'];
    					}
    					?>	
    					</span></a>
    				</h3>
				</div>
				<div class="col-md-6">
					<h3><span style="color: red;">Product Name:</span><span style="color: green;"><?php if(isset($_SESSION["shopping_cart"])){foreach ($_SESSION["shopping_cart"] as $key => $value) {
    					echo $value['product_name'].", ";
    				}}?></span></h3>
				</div>
					
    				
					<h3><strong>Billing Details</strong></h3>
				<div class="col-md-6">
					<div class="form-group">
					  
					  <label for="first">Full name</label>
					  <input class="form-control" id="firstname" type="text" value="<?php if(isset($_SESSION['full_name'])){echo $_SESSION['full_name'];}?>" readonly>
					  
					</div>
					<div class="form-group">
					  <label for="company">Company name(optional)</label>
					  <input type="text" class="form-control" id="companyname">
					</div>
					<div class="form-group">
					  <label for="country">Country<span style="color: red;">*</span></label>
					  <select class="form-control country_name_api" id="country_name">
					    <option>Select Country</option>
					  </select>
					</div>
					<script>
						$(document).ready(function(){
							$.ajax({
								type:"get",
								url:"https://restcountries.eu/rest/v2/all",
								success:function(data){
									$(data).each(function(e,v){
										$('.country_name_api').append("<option value="+v.name+">"+v.name+"</option>");
									});
								}
							});
						});
					</script>
					<div class="form-group">
					  <label for="street">Street address<span style="color: red;">*</span></label>
					  <input type="text" class="form-control" id="street_address">
					</div>
					<div class="form-group">
					  <label for="town">Town / City<span style="color: red;">*</span></label>
					  <input type="text" class="form-control" id="town_city">
					</div>
					<div class="form-group">
					  <label for="postcode">Postcode /ZIP(optional)</label>
					  <input type="text" class="form-control" id="postcode">
					</div>
					<div class="form-group">
					  <label for="phone">Phone</label>
					  <input type="text" class="form-control" value="<?php if(isset($_SESSION['mobile_number'])){echo $_SESSION['mobile_number'];}?>" readonly>
					</div>
					<div class="form-group">
					  <label for="note">Order notes(optional)</label>
					  <textarea class="form-control" rows="5" id="order_note" placeholder="Notes about your order,eg.special notes for delivery."></textarea>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Your Order</label>
						<div class="row" style="background: #ddd; padding:10px;">
							<div class="col-md-6">Product</div>
							<div class="col-md-6">Total</div>
						</div>
						<?php
						$sql="SELECT * FROM tbl_cart_temp";
						$conn=$db->prepare($sql);
						$conn->execute();
						$products=$conn->fetchAll(PDO::FETCH_ASSOC);
						foreach($products as $product){
						?>
						<div class="row" style="border:1px solid #ddd; padding:10px;">
							<div class="col-md-6"><?php echo $product['product_name'];?></div>
							<div class="col-md-6"><?php echo $product['product_price'];?></div>
						</div>
						<?php
						} 
						?>
						<div class="row" style="border:1px solid #ddd; padding:10px;">
							<div class="col-md-6">Total</div>
						<?php
						$total=0;
						$sql="SELECT SUM(product_price) FROM tbl_cart_temp";
						$conn=$db->prepare($sql);
						$conn->execute();
						$result=$conn->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $row){
						$total+= $row['SUM(product_price)'];
						?>
							<div class="col-md-6"><?php echo $total;?>.TK</div>
						<?php
						} 
						?>
						</div>
					</div>
					<div class="form-group">
						<label>Payment Method</label>
						<div class="panel-group" id="accordion">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
								<input type="checkbox" name="bank_transfer">
						        <a data-toggle="collapse" data-parent="#accordion" href="#banktransfer">
						        <label class="checkbox-inline">
									Direct bank transfer
								</label>
								</a>
						      </h4>
						    </div>
						    <div id="banktransfer" class="panel-collapse collapse in">
						      <div class="panel-body">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
								<input type="checkbox" name="cash_delivery">
						        <a data-toggle="collapse" data-parent="#accordion" href="#cash">
						        <label class="checkbox-inline">
									Cash on delivery
								</label>
								</a>
						      </h4>
						    </div>
						    <div id="cash" class="panel-collapse collapse in">
						      <div class="panel-body">Pay with cash upon delivery.</div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
								<input type="checkbox" name="paypal">
						        <a data-toggle="collapse" data-parent="#accordion" href="#paypal">
						        <label class="checkbox-inline">
									PayPal <img src="image/paypal.png">
								</label>
								</a>
						      </h4>
						    </div>
						    <div id="paypal" class="panel-collapse collapse in">
						      <div class="panel-body">Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</div>
						    </div>
						  </div>
						  </div>
						</div>
						<a class="place_order btn btn-warning btn-block" href="#" >PLACE ORDER</a>
					</div>
					
					
				</div>
			</div>

		</div>
	</div>
	
<!-- //checkout -->
<?php
include('home/footer.php');
?>