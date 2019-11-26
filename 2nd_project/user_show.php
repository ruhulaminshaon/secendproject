<?php include('admin_header.php');?>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>         
	
     
  <div class="content-wrapper">
    <div class="container-fluid">
	<div class="row">
		<div class="col-sm-8"> <h2 id="employment">User Show Field:</h2></div>
		<div class=" col-sm-4"> <input id="myInput" type="text" class="form-control" placeholder="Search.."></div>
	</div>     

     	<div class="table-responsive">
	 <!--table-dark-->
		  	<table class="table table-striped table-hover" id="myTable">
				<thead class="thead-light">
				  <tr>
					<th>ID</th>
					<th>User Name</th>
					<th>Image</th>
					<th>Email</th>
					<th>User_Type_Name</th>	
					<th>Role</th>
					<th>action</th>
				  </tr>
				</thead>
				<tbody>				 
				  <?php
				  $i=0;
				  $sql="SELECT * FROM login ";
				  $conn=$db->prepare($sql);
				  $conn->execute();

				  $result=$conn->fetchAll(PDO::FETCH_ASSOC);

				  
				  foreach($result as $row){
				  	
				  	$i++;

				  ?>
					<tr style="font-size:15px;">
						<td><?php echo $i;?></td>
						<td><?php echo $row['username'];?></td>
						<td><img src="image/<?php echo $row['image'];?>" width="50px" height="50px"></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['user_type_name'];?></td>
						<td><?php echo $row['role'];?></td>
					<?php				
						//if($_SESSION['user_type_name']=='admin'){						 
					?> 	
		 
						<td>
							<?php
							$arr=explode(",",$_SESSION['role']);
							if(in_array('view', $arr)){
							?>
							<a href="user_view.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-primary">View</button></a>
							<?php
							}
							$arr=explode(",",$_SESSION['role']);
							if(in_array('add', $arr)){
							?>
							<a href="user_add.php"><button type="button" class="btn btn-info">Add</button></a>
							<?php }
							$arr=explode(",",$_SESSION['role']);
							if(in_array('edit', $arr)){ 
							?>
							<a href="user_edit.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-warning">Edit</button></a>
							<?php }
							$arr=explode(",",$_SESSION['role']);
							if(in_array('delete', $arr)){  
							?>
							<a href="delete/user_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete!');"><button type="button" class="btn btn-danger">Delete</button></a>
							<?php } ?>
						</td>
							
					 </tr>
					
					 <?php 
					//	}
					}
					 ?>
					 
				</tbody>
			</table>
	  
	  	</div>
      
    </div>
    <!-- /.container-fluid-->
<?php include('admin_footer.php');?>