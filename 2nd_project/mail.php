<?php
include('config.php');
include('home/header.php');
?>
<!-- banner -->
	<div class="banner10" id="home1">
		<div class="container">
			<h2>Mail Us</h2>
		</div>
	</div>
<!-- //banner -->

<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Mail Us</li>
			</ul>
		</div>
	</div>
<!-- //breadcrumbs -->

<!-- mail -->
	<div class="mail">
		<div class="container">
			<h3>Mail Us</h3>
			<div class="agile_mail_grids">
				<div class="col-md-5 contact-left">
					<h4>Address</h4>
					<p>est eligendi optio cumque nihil impedit quo minus id quod maxime
						<span>26 56D Rescue,US</span></p>
					<ul>
						<li>Free Phone :+1 078 4589 2456</li>
						<li>Telephone :+1 078 4589 2456</li>
						<li>Fax :+1 078 4589 2456</li>
						<li><a href="mailto:info@example.com">info@example.com</a></li>
					</ul>
				</div>
				<div class="col-md-7 contact-left">
					<h4>Contact Form</h4>
					<form action="#" method="post">
						<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
						<textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<input type="submit" value="Submit" >
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="contact-bottom">
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d96908.54934770924!2d-73.74913540000001!3d40.62123259999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sanimal+rescue+service+near+Inwood%2C+New+York%2C+NY%2C+United+States!5e0!3m2!1sen!2sin!4v1436335928062" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
<!-- //mail -->
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