<?php include('admin_header.php');?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>     	
      
  <div class="content-wrapper">
  	<div class="container-fluid">
  		<a href="employment_show.php"><button type="button" class="btn btn-info">Back</button></a>
  	</div>
    <div class="container-fluid">
      <h2>Employee Information</h2>
		<?php
			$conn=$db->prepare("select * from employment e , desination des ,department d where e.des_id=des.des_id and e.dep_id=d.dep_id and e.id=?");			
			$conn->execute(array($_GET['id']));
			$result=$conn->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row){
		?>			
	  <div class="row">
		<div class="col-sm-4">			
				<h5>Image:</h5>
				<img src="image/<?php echo $row['image'];?>" class="img-thumbnail" width="400px" height="300px">		
		</div>
		<div class="col-sm-8">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Name:</th>
						<td> <?php echo $row['name'];?> </td>
					</tr>
					<tr>
						<th>Email:</th>
						<td> <?php echo $row['email'];?> </td>
					</tr>
					<tr>
						<th>Phone_number</th>
						<td> <?php echo $row['phone_number'];?> </td>
					</tr>
					<tr>
						<th>Address:</th>
						<td> <?php echo $row['address'];?> </td>
					</tr>
					<tr>
						<th>Dep_name</th>
						<td> <?php echo $row['dep_name'];?> </td>
					</tr><tr>
						<th>Des_name</th>
						<td> <?php echo $row['desination_name'];?> </td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
						<?php 
							if($row['status']==1){echo "Yes";}else{echo "No";} 
						?>
						</td>
					</tr>
				</table>
			</div>	
		</div>		
	  </div>
		<?php
			}
		?>      
    </div>
    <!-- /.container-fluid--> 
<?php include('admin_footer.php');?>