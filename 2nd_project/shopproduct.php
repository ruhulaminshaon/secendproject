<?php
include('config.php');
include('home/header.php');
?>
	
<!-- banner -->
	<div class="banner1" id="home1">
		<div class="container">
			<h2>trendy fashion dresses<span>up to</span> 30% <i>Discount</i></h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Dresses</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- dresses -->
	<div class="dresses">
		<div class="container">
			<div class="w3ls_dresses_grids">
				<div class="col-md-4 w3ls_dresses_grid_left">
					<div class="w3ls_dresses_grid_left_grid">
						<h3>Categories</h3>
						<div class="w3ls_dresses_grid_left_grid_sub">
							<?php
							$sql="SELECT * FROM categories";
							$conn=$db->prepare($sql);
							$conn->execute();
			    			$result=$conn->fetchAll(PDO::FETCH_ASSOC);
			    			foreach($result as $row)
			    			{
							?>
							<ul class="panel_bottom">
								<li><a class="categories_show" href="shopproduct.php?cat_id=<?php echo $row['id'];?>"><?php echo $row['cat_title'];?></a></li>
							</ul>
							<?php
							}
							?>
						</div>
						<script>
							$(document).ready(function(){
								$(document).on('click','.categories_show',function(){
									var cat_id=$(this).data();
									$.ajax({
										type:"get",
										data:{cat_id:cat_id},
										url:"ajax_show_category.php",
										seccess:function(data){
											$('.catidproduct_show').html(data);
										}
									});
								});
							});
						</script>
					</div>
					<div class="w3ls_dresses_grid_left_grid">
						<h3>Product Categori</h3>
						<div class="w3ls_dresses_grid_left_grid_sub">
							<div class="ecommerce_color">
								<?php
								$sql="SELECT * FROM product_categories";
								$conn=$db->prepare($sql);
								$conn->execute();
				    			$result=$conn->fetchAll(PDO::FETCH_ASSOC);
				    			foreach($result as $row)
				    			{
								?>
								<ul>
									<li><a href="shopproduct.php?pro_cat_id=<?php echo $row['id'];?>&name=<?php echo $row['p_cat_title'];?>"><i></i><?php echo $row['p_cat_title'];?></a></li>
								</ul>
								<?php
								}
								?>
							</div>
						</div>
					</div>
					<div class="w3ls_dresses_grid_left_grid">
						<h3>Size</h3>
						<div class="w3ls_dresses_grid_left_grid_sub">
							<div class="ecommerce_color ecommerce_size">
								<ul>
									<li><a href="#">Medium</a></li>
									<li><a href="#">Large</a></li>
									<li><a href="#">Extra Large</a></li>
									<li><a href="#">Small</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="w3ls_dresses_grid_left_grid">
						<div class="dresses_img_hover">
							<img src="images/47.jpg" alt=" " class="img-responsive" />
							<div class="dresses_img_hover_pos">
								<h4>For Kids <span>20%</span><i>Discount</i></h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 w3ls_dresses_grid_right">
					<div class="col-md-6 w3ls_dresses_grid_right_left">
						<div class="w3ls_dresses_grid_right_grid1">
							<img src="images/48.jpg" alt=" " class="img-responsive" />
							<div class="w3ls_dresses_grid_right_grid1_pos">
								<h3>Printed <span>Cotton</span> Top</h3>
							</div>
						</div>
					</div>
					<div class="col-md-6 w3ls_dresses_grid_right_left">
						<div class="w3ls_dresses_grid_right_grid1">
							<img src="images/49.jpg" alt=" " class="img-responsive" />
							<div class="w3ls_dresses_grid_right_grid1_pos1">
								<h3>Printed Blue <span>Cotton</span> Jeans</h3>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="clearfix"> </div>
					<div class="w3ls_dresses_grid_right_grid2">
						<div class="w3ls_dresses_grid_right_grid2_left">
							<h3>Showing Results: 0-1</h3>
						</div>
						<div class="w3ls_dresses_grid_right_grid2_right">
							
							<select class="select_item productcat_select">
								<option selected="selected">Select Product Categories</option>
								<?php
								$conn=$db->prepare("SELECT * FROM product_categories");
								$conn->execute();
								$result=$conn->fetchAll(PDO::FETCH_ASSOC);
								foreach($result as $row){
								?>
								<option value="<?php echo $row['id'];?>"><?php echo $row['p_cat_title'];?></option>
								<?php
								}
								?>
							</select>
						
							<select class="select_item categori_select">
								<option selected="selected">Select Categories</option>
								<?php
								$conn=$db->prepare("SELECT * FROM categories");
								$conn->execute();
								$result=$conn->fetchAll(PDO::FETCH_ASSOC);
								foreach($result as $row){
								?>
								<option value="<?php echo $row['id'];?>"><?php echo $row['cat_title'];?></option>
								<?php
								}
								?>
							</select>
							<button type="submit" class="btn btn-warning all_product_category_show">Click</button>
							
						</div>
						<div class="w3ls_dresses_grid_right_grid2_right">
							
						</div>
						<script>
							$(document).ready(function(){
								$(document).on('click','.all_product_category_show',function(){
									var product_select=$('.productcat_select').val();
									var catgory_select=$('.categori_select').val();
									$.ajax({
										type:'get',
										url:'ajax_show_product_categori.php',
										data:{product_select:product_select,catgory_select:catgory_select},
										success:function(data){
											$('.match_ajax_data_out').css({"display":"none"});
											$('.match_ajax_data_show').css({"display":"block"});
											$('.match_ajax_data_show').html(data);
										}
									});
								});
							});
						</script>
						<div class="clearfix"> </div>
					</div>
					<div class="match_ajax_data_show" style="display: none">
						
					</div>
					<?php
					if(isset($_GET['cat_id'])){
						
						$cat_id=$_GET['cat_id'];
							$sql="SELECT * FROM product WHERE cat_id=$cat_id";
								$conn=$db->prepare($sql);
								$conn->execute();
				    			$result=$conn->fetchAll(PDO::FETCH_ASSOC);
				    			foreach($result as $row){
				    				$query="SELECT multipalimage.*,product.* FROM multipalimage INNER JOIN product ON product.id=multipalimage.product_id WHERE product_id=$row[id]";
				    				$conn=$db->prepare($query);
									$conn->execute();
				    				$images=$conn->fetchAll(PDO::FETCH_ASSOC);
					?>
					<div class="w3ls_dresses_grid_right_grid3 match_ajax_data_out">
						<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
							<div class="agile_ecommerce_tab_left dresses_grid">
								<div class="hs-wrapper hs-wrapper2">
									<?php
									foreach ($images as $image) {
									?>
									<img src="image/product/<?php echo $image['image'];?>" alt=" " class="img-responsive" style="height: 100%"/>
									<?php
									}
									?>
									<div class="w3_hs_bottom w3_hs_bottom_sub1">
										
										<ul>
											<li>
												<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
											</li>
										</ul>
										
									</div>
								</div>
								<h5><a href="single_product.php?id=<?php echo $row['id'];?>"><?php echo $row['product_title'];?></a></h5>
								<div class="simpleCart_shelfItem">
									<p><span><?php echo $row['previa_price'];?>.TK</span> <i class="item_price"><?php echo $row['product_price'];?>.TK</i></p>
									<p><a class="item_add" href="single_product.php?id=<?php echo $row['id'];?>">Add to cart</a></p>
								</div>

								<?php
								$date=date("Y-m-d");
								if(date("Y-m-d",strtotime($row['product_date']))==$date){ ?>
								<div class="dresses_grid_pos">
									<h6>New</h6>
								</div>
								<?php }?>

							</div>
						</div>						
					</div>
					<?php
								}
					}else if(isset($_GET['pro_cat_id'])){
						$pro_cat_id=$_GET['pro_cat_id'];
						
							$sql="SELECT * FROM product WHERE p_cat_id=$pro_cat_id";
								$conn=$db->prepare($sql);
								$conn->execute();
				    			$result=$conn->fetchAll(PDO::FETCH_ASSOC);
				    			foreach($result as $row){
				    				$query="SELECT multipalimage.*,product.* FROM multipalimage INNER JOIN product ON product.id=multipalimage.product_id WHERE product_id=$row[id]";
				    				$conn=$db->prepare($query);
									$conn->execute();
				    				$images=$conn->fetchAll(PDO::FETCH_ASSOC);
					?>
					<div class="w3ls_dresses_grid_right_grid3 match_ajax_data_out">
						<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
							<div class="agile_ecommerce_tab_left dresses_grid">
								<div class="hs-wrapper hs-wrapper2">
									<?php
									foreach ($images as $image) {
									?>
									<img src="image/product/<?php echo $image['image'];?>" alt=" " class="img-responsive" style="height: 100%;"/>
									
									<div class="w3_hs_bottom w3_hs_bottom_sub1">
										<ul>
											<li>
												<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
											</li>
										</ul>
									</div>
									<?php 
									}
									?>
								</div>
								<h5><a href="single_product.php?id=<?php echo $row['id'];?>"><?php echo $row['product_title'];?></a></h5>
								<div class="simpleCart_shelfItem">
									<p><span><?php echo $row['previa_price'];?>.TK</span> <i class="item_price"><?php echo $row['product_price'];?>.TK</i></p>
									<p><a class="item_add" href="single_product.php?id=<?php echo $row['id'];?>">Add to cart</a></p>
								</div>
								<?php
								$date=date("Y-m-d");
								if(date("Y-m-d",strtotime($row['product_date']))==$date){ ?>
								<div class="dresses_grid_pos">
									<h6>New</h6>
								</div>
								<?php }?>
							</div>
						</div>						
					</div>
					<?php
								}
						
					}else{
						$sql="SELECT * FROM product WHERE product_price BETWEEN 10 AND 600";
						$conn=$db->prepare($sql);
						$conn->execute();
				    	$result=$conn->fetchAll(PDO::FETCH_ASSOC);
				    	foreach($result as $row){
				    		$query="SELECT multipalimage.*,product.* FROM multipalimage INNER JOIN product ON product.id=multipalimage.product_id WHERE product_id=$row[id]";
				    		$conn=$db->prepare($query);
							$conn->execute();
				    		$images=$conn->fetchAll(PDO::FETCH_ASSOC);
				    ?>
				    <div class="w3ls_dresses_grid_right_grid3 match_ajax_data_out">
						<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
							<div class="agile_ecommerce_tab_left dresses_grid">
								<div class="hs-wrapper hs-wrapper2">
									<?php
									foreach ($images as $image) {
									?>
									<img src="image/product/<?php echo $image['image'];?>" alt=" " class="img-responsive" style="height: 100%;"/>
									<?php
									} 
									?>
									<div class="w3_hs_bottom w3_hs_bottom_sub1">
										<ul>
											<li>
												<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
											</li>
										</ul>
									</div>
								</div>
								<h5><a href="single_product.php?id=<?php echo $row['id'];?>"><?php echo $row['product_title'];?></a></h5>
								<div class="simpleCart_shelfItem">
									<p><span><?php echo $row['previa_price'];?>.TK</span> <i class="item_price"><?php echo $row['product_price'];?>.TK</i></p>
									<p><a class="item_add" href="single_product.php?id=<?php echo $row['id'];?>">Add to cart</a></p>
								</div>
								<?php
								$date=date("Y-m-d");
								if(date("Y-m-d",strtotime($row['product_date']))==$date){ ?>
								<div class="dresses_grid_pos">
									<h6>New</h6>
								</div>
								<?php }?>
							</div>
						</div>						
					</div>
				    <?php
						}
					} 
					?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="w3l_related_products">
		<div class="container">
			<h3>
				<!-- Related Products -->
				New Products
			</h3>
			<ul id="flexiselDemo2">			
				<?php
				$sql="SELECT * FROM product ORDER BY id DESC LIMIT 10";
				$conn=$db->prepare($sql);
				$conn->execute();
				$result=$conn->fetchAll(PDO::FETCH_ASSOC);
				 	foreach($result as $row){

				 		$sql="SELECT multipalimage.*,product.* FROM product INNER JOIN multipalimage ON multipalimage.product_id=product.id WHERE product_id=$row[id]";
          				$conn=$db->prepare($sql);
						$conn->execute();
          				$result=$conn->fetchAll(PDO::FETCH_ASSOC);
				?>
				<li>
					<div class="w3l_related_products_grid">
						<div class="agile_ecommerce_tab_left dresses_grid">
							<div class="hs-wrapper hs-wrapper3">
								<?php
								foreach ($result as $key) {
								?>
								<img src="image/product/<?php echo $key['image']?>" alt=" " class="img-responsive" style="height:100%">
								<?php
								}
								?>
								<div class="w3_hs_bottom">
									<div class="flex_ecommerce">
										<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</div>
								</div>
							</div>
							<h5>
								<a href="single_product.php?id=<?php echo $row['id'];?>">
									<?php echo $row['product_title'];?>
								</a>
							</h5>
							<div class="simpleCart_shelfItem">
								<p class="flexisel_ecommerce_cart"><span><?php echo $row['previa_price'];?>.TK</span> <i class="item_price"><?php echo $row['product_price'];?>.TK</i></p>
								<p><a class="item_add" href="single_product.php?key=<?php echo $row['product_keywords'];?>&id=<?php echo $row['id'];?>">Add to cart</a></p>
							</div>
							<?php
							$date=date("Y-m-d"); 
							if(date("Y-m-d",strtotime($row['product_date']))==$date){ ?>
								<div class="dresses_grid_pos">
									<h6>New</h6>
								</div>
							<?php }?>
						</div>
					</div>
				</li>
				<?php
					}
				?>
			</ul>
				<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo2").flexisel({
							visibleItems:4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
				</script>
				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
<!-- //dresses -->
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