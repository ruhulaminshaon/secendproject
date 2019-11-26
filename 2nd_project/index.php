<?php
// session_start(); 
include('config.php');
include('home/header.php');
?>

<!-- banner -->
	<div class="banner" id="home1">
		<div class="container">
			<h3>fashions fade, <span>style is eternal</span></h3>
		</div>
	</div>
<!-- //banner -->

<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="col-md-5 wthree_banner_bottom_left">
				<div class="video-img">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog">
						<span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
					</a>
				</div>
				<!-- pop-up-box -->    
						<link href="css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
						<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!--//pop-up-box -->
					<div id="small-dialog" class="mfp-hide">
						<iframe src="https://player.vimeo.com/video/23259282?title=0&byline=0&portrait=0"></iframe>
					</div>
					<script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
					</script>
			</div>

			<div class="col-md-7 wthree_banner_bottom_right">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					
						<ul id="myTab" class="nav nav-tabs" role="tablist">
						<?php
						$sql="SELECT * FROM product_categories LIMIT 5";
						$conn=$db->prepare($sql);
          				$conn->execute();
          				$result=$conn->fetchAll(PDO::FETCH_ASSOC);
          				foreach($result as $row){
          				?>
							<li class="category_pre" role="presentation"><a type="submit" class="pro_cat" href="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $row['id']?>&name=<?php echo $row['p_cat_title'];?>" data-id="<?php echo $row['id'];?>"><?php echo $row['p_cat_title'];?></a></li>
          				<?php
          				}
						?>
						</ul>

					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">

							<div class="agile_ecommerce_tabs">
								<?php
								if(isset($_GET['id'])){
									$id=$_GET['id'];
									
									$q="SELECT product_categories.*,product.* FROM product INNER JOIN product_categories ON product_categories.id=product.p_cat_id WHERE product_categories.id=$id LIMIT 3";
									
									$conn=$db->prepare($q);
									$conn->execute();
          							$result=$conn->fetchAll(PDO::FETCH_ASSOC);
          							foreach($result as $res ){
          								$query="SELECT multipalimage.*,product.* FROM multipalimage INNER JOIN product ON multipalimage.product_id=product.id WHERE multipalimage.product_id=$res[id]";
          								$conn=$db->prepare($query);
										$conn->execute();
          								$images=$conn->fetchAll(PDO::FETCH_ASSOC);
          						?>
          							<div class="col-md-4 agile_ecommerce_tab_left">
										<div class="hs-wrapper">
											<?php
											foreach ($images as $image) {
											?>
											<img src="image/product/<?php echo $image['image'] ;?>" alt="<?php echo $res['product_title'];?>" class="img-responsive" title="<?php echo $image['p_cat_title']?>" style="height: 100%; width: 100%;" />
											<?php
											}
											?>
											<div class="w3_hs_bottom">
												<ul>
													<li>
														<a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
													</li>
												</ul>
											</div>
										</div>
										<h5><a href="single_product.php"><?php echo $image['product_title'];?></a></h5>
										<div class="simpleCart_shelfItem">
											<p><span><?php echo $image['previa_price'];?>.TK</span> <i class="item_price"><?php echo $image['product_price'];?>.TK</i></p>
											<p><a class="item_add" href="single_product.php?id=<?php echo $image['id'];?>&key=<?php echo $image['product_keywords'];?>">Product Details</a></p>
										</div>
									</div> 
          						<?php
          							}

								}else{

									$q="SELECT * FROM product ORDER BY product_title DESC LIMIT 3";
									$conn=$db->prepare($q);
									$conn->execute();
          							$result=$conn->fetchAll(PDO::FETCH_ASSOC);
          							foreach($result as $res ){
          								
          								$sql="SELECT multipalimage.*,product.* FROM product INNER JOIN multipalimage ON multipalimage.product_id=product.id WHERE product_id=$res[id]";
          								$conn=$db->prepare($sql);
										$conn->execute();
          								$result=$conn->fetchAll(PDO::FETCH_ASSOC);

          						?>
          							<div class="col-md-4 agile_ecommerce_tab_left">
										<div class="hs-wrapper">
											<?php
											foreach ($result as $key) {
											?>
											<img src="image/product/<?php echo $key['image'];?>" alt="<?php echo $key['product_title'];?>" class="img-responsive" style="height:100%; width:100%;"/>
											<?php
											}
											?>
											<div class="w3_hs_bottom">
												<ul>
													<li>
														<a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
													</li>
												</ul>
											</div>
										</div>
										<h5><a href="single_product.php"><?php echo $res['product_title'];?></a></h5>
										<div class="simpleCart_shelfItem">
											<p><span><?php echo $key['previa_price'];?>.TK</span> <i class="item_price"><?php echo $key['product_price'];?>.TK</i></p>
											<p><a class="item_add" href="single_product.php?id=<?php echo $key['id'];?>&key=<?php echo $key['product_keywords'];?>">Product Details</a></p>
										</div>
										<?php
										$date=date("Y-m-d"); 
										if(date("Y-m-d",strtotime($key['product_date']))==$date){ ?>
											<div class="dresses_grid_pos">
												<h6>New</h6>
											</div>
										<?php }?>
									</div> 
          						<?php
          							}
								}
								?>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					
				</div>
					<!--modal-video-->
				<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
							</div>
							<section>
								<div class="modal-body">
									<div class="col-md-5 modal_body_left">
										<img src="images/20.jpg" alt=" " class="img-responsive" />
									</div>
									<div class="col-md-7 modal_body_right">
										<h4>a good look women's shirt</h4>
										<p>Ut enim ad minim veniam, quis nostrud 
											exercitation ullamco laboris nisi ut aliquip ex ea 
											commodo consequat.Duis aute irure dolor in 
											reprehenderit in voluptate velit esse cillum dolore 
											eu fugiat nulla pariatur. Excepteur sint occaecat 
											cupidatat non proident, sunt in culpa qui officia 
											deserunt mollit anim id est laborum.</p>
										<div class="rating">
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="modal_body_right_cart simpleCart_shelfItem">
											<p><span>$320</span> <i class="item_price">$250</i></p>
											<p><a class="item_add" href="#">Product Details</a></p>
										</div>
										<h5>Color</h5>
										<div class="color-quality">
											<ul>
												<li><a href="#"><span></span>Red</a></li>
												<li><a href="#" class="brown"><span></span>Yellow</a></li>
												<li><a href="#" class="purple"><span></span>Purple</a></li>
												<li><a href="#" class="gray"><span></span>Violet</a></li>
											</ul>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
							</div>
							<section>
								<div class="modal-body">
									<div class="col-md-5 modal_body_left">
										<img src="images/63.jpg" alt=" " class="img-responsive" />
									</div>
									<div class="col-md-7 modal_body_right">
										<h4>a good look black women's jeans</h4>
										<p>Ut enim ad minim veniam, quis nostrud 
											exercitation ullamco laboris nisi ut aliquip ex ea 
											commodo consequat.Duis aute irure dolor in 
											reprehenderit in voluptate velit esse cillum dolore 
											eu fugiat nulla pariatur. Excepteur sint occaecat 
											cupidatat non proident, sunt in culpa qui officia 
											deserunt mollit anim id est laborum.</p>
										<div class="rating">
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="modal_body_right_cart simpleCart_shelfItem">
											<p><span>$320</span> <i class="item_price">$250</i></p>
											<p><a class="item_add" href="#">Add to cart</a></p>
										</div>
										<h5>Color</h5>
										<div class="color-quality">
											<ul>
												<li><a href="#"><span></span>Red</a></li>
												<li><a href="#" class="brown"><span></span>Yellow</a></li>
												<li><a href="#" class="purple"><span></span>Purple</a></li>
												<li><a href="#" class="gray"><span></span>Violet</a></li>
											</ul>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="modal video-modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
							</div>
							<section>
								<div class="modal-body">
									<div class="col-md-5 modal_body_left">
										<img src="images/23.jpg" alt=" " class="img-responsive" />
									</div>
									<div class="col-md-7 modal_body_right">
										<h4>a good look women's Watch</h4>
										<p>Ut enim ad minim veniam, quis nostrud 
											exercitation ullamco laboris nisi ut aliquip ex ea 
											commodo consequat.Duis aute irure dolor in 
											reprehenderit in voluptate velit esse cillum dolore 
											eu fugiat nulla pariatur. Excepteur sint occaecat 
											cupidatat non proident, sunt in culpa qui officia 
											deserunt mollit anim id est laborum.</p>
										<div class="rating">
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="modal_body_right_cart simpleCart_shelfItem">
											<p><span>$320</span> <i class="item_price">$250</i></p>
											<p><a class="item_add" href="#">Add to cart</a></p>
										</div>
										<h5>Color</h5>
										<div class="color-quality">
											<ul>
												<li><a href="#"><span></span>Red</a></li>
												<li><a href="#" class="brown"><span></span>Yellow</a></li>
												<li><a href="#" class="purple"><span></span>Purple</a></li>
												<li><a href="#" class="gray"><span></span>Violet</a></li>
											</ul>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="modal video-modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal3">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
							</div>
							<section>
								<div class="modal-body">
									<div class="col-md-5 modal_body_left">
										<img src="images/24.jpg" alt=" " class="img-responsive" />
									</div>
									<div class="col-md-7 modal_body_right">
										<h4>a good look women's Sandal</h4>
										<p>Ut enim ad minim veniam, quis nostrud 
											exercitation ullamco laboris nisi ut aliquip ex ea 
											commodo consequat.Duis aute irure dolor in 
											reprehenderit in voluptate velit esse cillum dolore 
											eu fugiat nulla pariatur. Excepteur sint occaecat 
											cupidatat non proident, sunt in culpa qui officia 
											deserunt mollit anim id est laborum.</p>
										<div class="rating">
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="modal_body_right_cart simpleCart_shelfItem">
											<p><span>$320</span> <i class="item_price">$250</i></p>
											<p><a class="item_add" href="#">Add to cart</a></p>
										</div>
										<h5>Color</h5>
										<div class="color-quality">
											<ul>
												<li><a href="#"><span></span>Red</a></li>
												<li><a href="#" class="brown"><span></span>Yellow</a></li>
												<li><a href="#" class="purple"><span></span>Purple</a></li>
												<li><a href="#" class="gray"><span></span>Violet</a></li>
											</ul>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="modal video-modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModal4">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
							</div>
							<section>
								<div class="modal-body">
									<div class="col-md-5 modal_body_left">
										<img src="images/22.jpg" alt=" " class="img-responsive" />
									</div>
									<div class="col-md-7 modal_body_right">
										<h4>a good look women's Necklace</h4>
										<p>Ut enim ad minim veniam, quis nostrud 
											exercitation ullamco laboris nisi ut aliquip ex ea 
											commodo consequat.Duis aute irure dolor in 
											reprehenderit in voluptate velit esse cillum dolore 
											eu fugiat nulla pariatur. Excepteur sint occaecat 
											cupidatat non proident, sunt in culpa qui officia 
											deserunt mollit anim id est laborum.</p>
										<div class="rating">
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="modal_body_right_cart simpleCart_shelfItem">
											<p><span>$320</span> <i class="item_price">$250</i></p>
											<p><a class="item_add" href="#">Add to cart</a></p>
										</div>
										<h5>Color</h5>
										<div class="color-quality">
											<ul>
												<li><a href="#"><span></span>Red</a></li>
												<li><a href="#" class="brown"><span></span>Yellow</a></li>
												<li><a href="#" class="purple"><span></span>Purple</a></li>
												<li><a href="#" class="gray"><span></span>Violet</a></li>
											</ul>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="modal video-modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModal5">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
							</div>
							<section>
								<div class="modal-body">
									<div class="col-md-5 modal_body_left">
										<img src="images/35.jpg" alt=" " class="img-responsive" />
									</div>
									<div class="col-md-7 modal_body_right">
										<h4>a good look women's Jacket</h4>
										<p>Ut enim ad minim veniam, quis nostrud 
											exercitation ullamco laboris nisi ut aliquip ex ea 
											commodo consequat.Duis aute irure dolor in 
											reprehenderit in voluptate velit esse cillum dolore 
											eu fugiat nulla pariatur. Excepteur sint occaecat 
											cupidatat non proident, sunt in culpa qui officia 
											deserunt mollit anim id est laborum.</p>
										<div class="rating">
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="modal_body_right_cart simpleCart_shelfItem">
											<p><span>$320</span> <i class="item_price">$250</i></p>
											<p><a class="item_add" href="#">Add to cart</a></p>
										</div>
										<h5>Color</h5>
										<div class="color-quality">
											<ul>
												<li><a href="#"><span></span>Red</a></li>
												<li><a href="#" class="brown"><span></span>Yellow</a></li>
												<li><a href="#" class="purple"><span></span>Purple</a></li>
												<li><a href="#" class="gray"><span></span>Violet</a></li>
											</ul>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</section>
						</div>
					</div>
				</div>
				<div class="modal video-modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModal6">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
							</div>
							<section>
								<div class="modal-body">
									<div class="col-md-5 modal_body_left">
										<img src="images/39.jpg" alt=" " class="img-responsive" />
									</div>
									<div class="col-md-7 modal_body_right">
										<h4>a good look women's Long Skirt</h4>
										<p>Ut enim ad minim veniam, quis nostrud 
											exercitation ullamco laboris nisi ut aliquip ex ea 
											commodo consequat.Duis aute irure dolor in 
											reprehenderit in voluptate velit esse cillum dolore 
											eu fugiat nulla pariatur. Excepteur sint occaecat 
											cupidatat non proident, sunt in culpa qui officia 
											deserunt mollit anim id est laborum.</p>
										<div class="rating">
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star-.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="rating-left">
												<img src="images/star.png" alt=" " class="img-responsive" />
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="modal_body_right_cart simpleCart_shelfItem">
											<p><span>$320</span> <i class="item_price">$250</i></p>
											<p><a class="item_add" href="#">Add to cart</a></p>
										</div>
										<h5>Color</h5>
										<div class="color-quality">
											<ul>
												<li><a href="#"><span></span>Red</a></li>
												<li><a href="#" class="brown"><span></span>Yellow</a></li>
												<li><a href="#" class="purple"><span></span>Purple</a></li>
												<li><a href="#" class="gray"><span></span>Violet</a></li>
											</ul>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //banner-bottom -->

<!-- banner-bottom1 -->
	<div class="banner-bottom1">
		<div class="agileinfo_banner_bottom1_grids">
			<div class="col-md-7 agileinfo_banner_bottom1_grid_left">
				<h3>Grand Opening Event With flat<span>20% <i>Discount</i></span></h3>
				<a href="products.html">Shop Now</a>
			</div>
			<div class="col-md-5 agileinfo_banner_bottom1_grid_right">
				<h4>hot deal</h4>
				<div class="timer_wrap">
					<div id="counter"> </div>
				</div>
				<script src="js/jquery.countdown.js"></script>
				<script src="js/script.js"></script>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //banner-bottom1 -->

<!-- special-deals -->
	<div class="special-deals">
		<div class="container">
			<h2>Special Deals</h2>
			<div class="w3agile_special_deals_grids">
				<div class="col-md-7 w3agile_special_deals_grid_left">
					<div class="w3agile_special_deals_grid_left_grid">
						<img src="images/26.jpg" alt=" " class="img-responsive" />
						<div class="w3agile_special_deals_grid_left_grid_pos1">
							<h5>30%<span>Off/-</span></h5>
						</div>
						<div class="w3agile_special_deals_grid_left_grid_pos">
							<h4>We Offer <span>Best Products</span></h4>
						</div>
					</div>
					<div class="wmuSlider example1">
						<div class="wmuSliderWrapper">
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="images/1.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Laura</h4>
									</div>
								</div>
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="images/2.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Michael</h4>
									</div>
								</div>
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="images/3.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Rosy</h4>
									</div>
								</div>
							</article>
						</div>
					</div>
						<script src="js/jquery.wmuSlider.js"></script> 
						<script>
							$('.example1').wmuSlider();         
						</script> 
				</div>
				<div class="col-md-5 w3agile_special_deals_grid_right">
					<img src="images/25.jpg" alt=" " class="img-responsive" />
					<div class="w3agile_special_deals_grid_right_pos">
						<h4>Women's <span>Special</span></h4>
						<h5>save up <span>to</span> 30%</h5>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //special-deals -->
<!-- new-products -->
	<div class="new-products w3l_related_products">
		<div class="container">
			<h3>New Products</h3>
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
								<img src="image/product/<?php echo $key['image']?>" alt="<?php echo $key['product_title'];?> " class="img-responsive" style="height:100%;">
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
<!-- //new-products -->
<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Top Brands</h3>
			<div class="sliderfig">
				<ul id="flexiselDemo1">			
					<li>
						<img src="images/4.png" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/5.png" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/6.png" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/7.png" alt=" " class="img-responsive" />
					</li>
					<li>
						<img src="images/46.jpg" alt=" " class="img-responsive" />
					</li>
				</ul>
			</div>
					<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 4,
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
<!-- //top-brands -->
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
					<input type="submit" value="" />
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->
<?php
include('home/footer.php');
?>