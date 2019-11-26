<?php include('admin_header.php');?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>     	
      
  <div class="content-wrapper">
  	<div class="container-fluid">
  		<a href="attendance_show.php"><button type="button" class="btn btn-info">Back</button></a>
  	</div>
    <div class="container-fluid">
      <h2>Attendance </h2>
				
	  
		<div class="table-responsive">
				<table class="table">
					<tr>
						<th>No</th>						
						<th>In Time</th>
				        <th>Out Time</th>
				        <th>Action</th>						
					</tr>
					<?php
						$i=0;
						$sql="SELECT * FROM attendance att, employment e where att.emp_name=e.id AND e.id ='".$_REQUEST['id']."'";
							$conn=$db->prepare($sql);			
							$conn->execute();
							$result=$conn->fetchAll(PDO::FETCH_ASSOC);
							foreach($result as $row){
								$i++;
					?>	
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo date("d-m-y h:i:sa", $row['att_in_time'] ) ; ?></td>
          				<td><?php echo date("d-m-y h:i:sa", $row['att_out_time'] ) ; ?></td>
					</tr>
					<?php
						}
					?>
				</table>
				
				
	  </div>
		      
    </div>
    <!-- /.container-fluid--> 
<?php include('admin_footer.php');?>