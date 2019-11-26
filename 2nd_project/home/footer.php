<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><a href="about.php">About Us</a></li>
						<li><a href="mail.php">Contact Us</a></li>
						<li><a href="short-codes.php">Short Codes</a></li>
						<li><a href="faq.php">FAQ's</a></li>
						<li><a href="products.php">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<?php
					$sql="SELECT * FROM product_categories";
					$conn=$db->prepare($sql);
					$conn->execute();
          			$result=$conn->fetchAll(PDO::FETCH_ASSOC);
          			foreach($result as $row){
					?>
					<ul class="info"> 
						<li><a href="#"><?php echo $row['p_cat_title'];?></a></li>
					</ul>
					<?php
					}
					?>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><a href="products.html">Summer Store</a></li>
						<li><a href="checkout.html">My Cart</a></li>
					</ul>
					<h4>Follow Us</h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="https://www.facebook.com/" class="facebook" target="blank"> </a></li>
							<li><a href="https://twitter.com/login" class="twitter" target="blank"> </a></li>
							<li><a href="https://www.google.com/" class="google" target="blank"> </a></li>
							<li><a href="https://www.pinterest.com/" class="pinterest" target="blank"> </a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-copy">
			<div class="footer-copy1">
				<div class="footer-copy-pos">
					<a href="#home1" class="scroll"><img src="images/arrow.png" alt=" " class="img-responsive" /></a>
				</div>
			</div>
			<div class="container">
				<p>&copy; 2016 Women's Fashion. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>