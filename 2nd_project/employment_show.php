<?php include('admin_header.php');?>

<div class="collapse navbar-collapse" id="navbarResponsive">
    <?php include('admin_left_side_menu.php');?>         
	
      
  <div class="content-wrapper">
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-8"> <h2 id="employment"><span style="color:red;">E</span><span style="color: blue;">m</span><span style="color: yellow;">p</span>l<span style="color: #ddd;">o</span><span style="color:	#BA55D3;">y</span><span style="color:pink;">e</span><span style="color: #FF6347;">e</span><span style="color: #CD5C5C;"></span> Management</h2></div>
			<div class=" col-sm-4"> <input id="myInput" type="text" class="form-control" placeholder="Search.."></div>
		</div>   
     	<div class="table-responsive">
	 <!--table-dark-->
		  	<table class="table table-striped table-hover" id="myTable">
				<thead class="thead-dark">
				  <tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Image</th>					
					<th>Dep_Name</th>
					<th>Des_Name</th>
					<th>status</th>
					<th>action</th>
				  </tr>
				</thead>
				<tbody>				 
				<?php
					$i=0;
					$query="select * from employment e, desination des ,department d where e.des_id=des.id and e.dep_id=d.id";
					$conn=$db->prepare($query);
					$conn->execute();
					$result=$conn->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row){
						$i++;
				?>
					<tr style="font-size:15px;">						
						<td><?php echo $i;?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><img src="image/<?php echo $row['image'];?>" width="50px" height="50px"></td>
						<td><?php echo $row['dep_name'];?></td>
						<td><?php echo $row['des_name'];?></td>
						<td><?php if($row['status']==0){echo "Yes";}else{echo "No";} ?></td>
						
				<?php				
						if($_SESSION['user_type_name']=='admin'){				 
				?>
						<td>
							<?php
							$arr=explode(",",$_SESSION['role']);
							if(in_array('view', $arr)){
							?>
							<a href="empoly_view.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-info">View</button></a> 
							<?php }   
							$arr=explode(",",$_SESSION['role']);
							if(in_array('edit', $arr)){
							?><a href="empoly_edit.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-warning">Edit</button></a>
							<?php }
							$arr=explode(",",$_SESSION['role']);
							if(in_array('delete', $arr)){
							?><a href="delete/empoly_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete!');"><button type="button" class="btn btn-danger">Delete</button></a>
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