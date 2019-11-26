<?php 
$pages='depart_show';
// session_start();
// include('config.php');
?>
<?php include('admin_header.php');?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
    	<div class="container">
	      	<h2>Department show</h2>
		  
		    <table class="table table-hover">
				<thead class="thead-dark">
				  <tr>
					<th>Department ID</th>
					<th>Department Name</th>
					<th>action</th>
				  </tr>
				</thead>
				<tbody>
					<?php
					$i=0;
					$conn=$db->prepare("select * from department");
					$conn->execute();
					$result=$conn->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row){
						$i++;
					?>
				  <tr>			  
					<td><?php echo $i;?></td>
					<td><?php echo $row['dep_name'];?></td>
					<td>
						<a href="department_add.php?edit=<?php echo $row['id'];?>" class="btn btn-warning" name="edit">Edit</a>
						<a href="department_show.php?delete=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete!');" ><button type="button" class="btn btn-danger">Delete</button></a>
					</td>
					<?php
						if($_SESSION['user_type_name']=='admin'){
					?>
					<td>
						<?php						
							$arr=explode(",",$_SESSION['role']);
							if(in_array('edit', $arr)){
						?>
						<a href="department_edit.php?id=<?php echo $row['dep_id'];?>"><button type="button" class="btn btn-warning">Edit</button></a> 
						<?php }
							$arr=explode(",",$_SESSION['role']);
							if(in_array('delete',$arr)){ 
						?> 
						<a href="delete/department_delete.php?id=<?php echo $row['dep_id'];?>" onclick="return confirm('Are you sure to delete!');" ><button type="button" class="btn btn-danger">Delete</button></a>
						<?php } ?>
					</td>
						 </tr>
					<?php
						}
					}
					
					?>
				</tbody>
			</table>
	 	</div>
    </div>
    <!-- /.container-fluid-->
<?php include('admin_footer.php');?>

