<?php 
$pages='weather';
include('admin_header.php');?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?> 	 
  <div class="content-wrapper">
    <div class="container-fluid">
      <h2>Weather </h2><!--blog.hackerrahul.com-->
		<center>
			<form action="get.php" method="get" >
				<h3>Type City and Country</h3>
				<br><p>Form Example Dhaka,in</p>
				<input type="text" name="q" required>
				<input type="submit" name="submit">
			</form>
		</center>
    </div>
    <!-- /.container-fluid--> 
<?php include('admin_footer.php');?>