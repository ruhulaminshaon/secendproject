<?php 
// session_start();
// include('config.php');
?>
<?php include('admin_header.php');?>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>               
        
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <h2>Desination show</h2>
	   
	   <table class="table table table-hover">
			<thead class="thead-dark">
			  <tr>
				<th>Desination ID</th>
				<th>Desination Name</th>
				<th>action</th>
			  </tr>
			</thead>
			<tbody>
				<?php
				$i=0;
				$sql="select * from desination";
				$conn=$db->prepare($sql);
				$conn->execute();
				$result=$conn->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row){
					$i++;
					?>
			  <tr>
			  
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['des_name'];?></td>
				<td><a class="btn btn-warning" href="#">Edit</a> | <a class="btn btn-danger" href="#">Delete</a></td>
			<?php
				
				if($_SESSION['user_type_name']=='admin'){
				 
			?>
				<td>
					
					<?php
						
						$arr=explode(",",$_SESSION['role']);
						if(in_array('edit', $arr)){
					?>
					<a href="desination_edit.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-success">Edit</button></a>
					<?php 
						}
						$arr=explode(",",$_SESSION['role']);
						if(in_array('delete', $arr)){

					?>  <a onclick="return confirm('Are you sure to delete this Desination name');" href="delete/desination_delete.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger">Delete</button></a>
					<?php 
						}
					?>
				</td>
				
			  </tr>
			<?php	
					}
				}
				
			?>
			</tbody>
		  </table>
	  
	  
      
    </div>
    <!-- /.container-fluid-->
   
   
<?php include('admin_footer.php');?>

