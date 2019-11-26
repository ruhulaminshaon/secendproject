<?php
include('config.php');
include('home/header.php');
// if(isset($_GET['cart_id'])){
// 	$cart_id=$_GET['cart_id'];
// 	$sql="SELECT * FROM product WHERE id=?";
// 	$conn=$db->prepare($sql);
// 	$conn->execute(array($cart_id));
// 	$result=$conn->fetchAll(PDO::FETCH_ASSOC);

// }

//delete
if(isset($_GET['del_id'])){
	$delid=$_GET['del_id'];
	if(isset($_POST['delete_id'])){
		$sql="DELETE FROM tbl_cart_temp WHERE id=?";
		$conn=$db->prepare($sql);
		$result=$conn->execute(array($delid));
		if($result){
			$delte_message="<div class='alert alert-info'><strong>Delete Success !</strong></div>";
		}else{
			$delte_message="<div class='alert alert-warning'><strong>Delete Error !</strong></div>";
		}
	}
}

?>
<!-- banner -->
	<div class="banner10" id="home1">
		<div class="container">
			<h2>Checkout</h2>
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
			
			<?php
			$sql="SELECT * FROM tbl_cart_temp";
			$conn=$db->prepare($sql);
			$conn->execute();
    		$count=$conn->rowCount();
			?>
			<h3>Your shopping cart contains: <span><?php 
			if($count!=0){
				echo $count." Products" ;
			}
			else{
				echo "No Product";
			}
				?> </span></h3>
		<?php
			if(isset($err_message_show)){
				echo $err_message_show;
			}	
			if(isset($update_message)){
				echo $update_message;
			}
			if(isset($delte_message)){
				echo $delte_message;
			}						
		?>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product Name</th>
							<th>Price</th>
							<th>Product</th>
							<th>Quality</th>
							<th>Remove</th>
						</tr>
					</thead>
					<?php
					$result=$conn->fetchAll(PDO::FETCH_ASSOC);
					$i=1;
    				foreach($result as $row){
    					$cartarray=array(
    						'id'=>$row['id'],
    						'product_name'=>$row['product_name'],
    						'product_image'=>$row['product_image'],
    						'product_id'=>$row['product_id'],
    						'product_size'=>$row['product_size'],
    						'quantity'=>$row['product_sales_quantity'],
    						'price'=>$row['product_price']
    					);
    					
    					//session 
    					$_SESSION["shopping_cart"][]=$cartarray;

					?>
					<tr class="rem1">
						<td class="invert"><?php echo $i++;?><input type="hidden" id="hidden_id" name="product_id" value="<?php echo $row['id'];?>"></td>
						<td class="invert"><?php echo $row['product_name']; ?><input type="hidden" name="product_hidden_name" value="<?php echo $row['product_name'];?>"></td>
						<td class="invert"><?php echo $row['product_price']; ?><input type="hidden" name="product_hidden_price" value="<?php echo $row['product_price'];?>"></td>
						<td class="invert-image"><a href="#"><img src="image/product/<?php echo $row['product_image'];?>" alt=" " class="img-responsive" /></a></td>
						<td class="invert"><input type="number" value="<?php echo $row['product_sales_quantity'];?>" id="quenty_update" name="product_quenty"></td>
						
						<!-- <td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">  
									<input type="number" name="update_quantity" value="">
									<input type="hidden" name="upquantity_id" value="">
									<input type="submit" name="update"  value="Update">                         
								</div>
							</div>
						</td> -->
						<td class="invert">
							<form action="checkout.php?del_id=<?php echo $row['id'];?>" method="post">
							<div class="rem">
								<button type="submit" name="delete_id" value="Delete">X</button>
							</div>
							</form>
						</td>
					</tr>
					<?php
					}
					?>		
				</table>
				<script>
					$(document).ready(function(){
						$(document).on('change','#quenty_update',function(){
							var hidden_id=$('#hidden_id').val();
							var qut=$(this).val();
							$.ajax({
								type:'post',
								data:'{hidden_id:hidden_id,qut:qut}',
								url:"quenty_update.php",
								success:function(data){
									alert('Update Success');
								}
							});
						});
					});
				</script>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
					<?php 
					$total_price=0;
						$conn=$db->prepare("SELECT product_name,SUM(product_price) FROM tbl_cart_temp GROUP BY product_name");
						$conn->execute();
		    			$result=$conn->fetchAll(PDO::FETCH_ASSOC);
		    			foreach($result as $row){
		    				$total_price +=$row['SUM(product_price)'];
					?>
					<li><?php echo $row['product_name'];?> <i>-</i> <span><?php echo $row['SUM(product_price)'];?>.TK </span></li>
					<?php 
						}
					?>
						<li>Total <i>-</i> <span><?php echo $total_price;?>.TK</span></li>
					</ul>
				</div>
				
				<div class="checkout-right-basket">
					<a href="shopproduct.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="checkout-left-basket">					
					
					<?php
						if(isset($_SESSION['full_name']) && isset($_SESSION['id'])){
					?>
						<a type="submit" href="proceedcheckout.php" style="border: 1px solid #000;padding: 10px; color: red; background: #000;">Proceed Checkout <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
					<?php
						}else{
					?>
						<a type="submit" href="productlogin.php" name="productlogin" style="border: 1px solid #000;padding: 10px; color: #fff; background: #000;">Proceed Checkout <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
					<?php
						}
					?>
				</div>
		</div>
	</div>
<!-- //checkout -->

<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="col-md-6 w3agile_newsletter_left">
				<h3>Newsletter</h3>
				<p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
			</div>
			<div class="col-md-6 w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->
<?php
include('home/footer.php');
?>